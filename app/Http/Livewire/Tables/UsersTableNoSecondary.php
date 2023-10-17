<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\{BooleanColumn, ButtonGroupColumn, ComponentColumn, ImageColumn, LinkColumn};
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateFilter, DateRangeFilter, DateTimeFilter, MultiSelectDropdownFilter, MultiSelectFilter, NumberFilter, NumberRangeFilter, SelectFilter, TextFilter};
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Traits\TestFilterTrait;
//use App\Http\Livewire\LivewireComponentFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\LivewireComponentFilter;
use Livewire\Attributes\On; 
use App\Traits\DemoTablesTrait;

class UsersTable extends DataTableComponent
{
    use TestFilterTrait;
    use DemoTablesTrait;

    public $myParam = 'Default';

    public string $tableName = 'users2';

    public array $users1 = [];
    public array $users2 = [];

    #[Reactive] 
    public array $filterComponents2 = ['test_filter' => ''];

    public array $allTags = [];

    public string $filterLayout = 'popover';

    public array $fileList;

    public string $temp = '';
    
    #[Reactive] 
    public string $testWireable = 'tesat 123';

    public function updatedFilterComponents($val, $key)
    {
        return;
    }

    #[On('update-the-filter')] 
    public function updateTheFilter()
    {
        return;
    }

    public function configure(): void
    {
        $component = $this;

        $componentQueryString = [];
        //$userExample->tags()->sync(Tag::inRandomOrder()->take(rand(1,3))->get()->pluck('tags.id')->toArray());
        //$user = User::findOrFail(1);
        //$user->jsoncol = ['test' => 'test123', 'new' => ''];
        //$user->save();
        //$this->userExample
        //(Tag::inRandomOrder()->take(rand(1,3))->get()->toArray());
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['users.id as id', 'users.parent_id as parent_id'])
            ->setFilterLayout($this->filterLayout)
            ->setReorderEnabled()
            ->setSingleSortingDisabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
                if ($column->getTitle() == 'Address') {
                    return ['class' => 'text-red-500 break-all', 
                            'default' => false
                    ];
                }
                else return ['default' => true];

            })
            ->setSecondaryHeaderTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
                if ($column->isField('address.address')) {
                    return ['class' => 'text-red-500'];
                }
                else if ($column->isHidden())
                {
                    return ['class' => 'invisible',
                    'default' => false];
                }
                else return ['default' => true];
            })
            ->setExcludeDeselectedColumnsFromQueryDisabled()
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setTableRowUrl(function ($row) {
                return 'https://google-'.$row->id.'.com';
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_blank';
            })
            ->setTableAttributes([
                'id' => 'table-users2',
                'class' => 'bg-red-500',
            ])
           // ->setFilterPopoverAttributes([
               // //'class' => 'bg-red-500',
               // 'style' => 'background-color: green;',
             //   'default' => true
          //  ])
          //  ->setSearchFieldAttributes([
          //      'style' => 'background-color: green;',
          //      'default' => true
          //  ])

            ->setEagerLoadAllRelationsDisabled()
            ->setPaginationMethod('cursor')
            ->setPerPageAccepted([10, 25, 50, 100]);


    }

    public function columns(): array
    {
        return [
                Column::make('Order', 'sort')
                ->sortable()
                ->collapseOnMobile(),

                ImageColumn::make('Avatar')
                ->location(
                    fn($row) => 'storage/avatars/' . $row->id . '.jpg'
                )
                ->attributes(fn($row) => [
                    'class' => 'rounded-full',
                    'alt' => $row->name . ' Avatar',
                ]),

            Column::make('Name')
                ->sortable(function (Builder $query, string $direction) {
                    return $query->orderBy('users.name', $direction); // Example, ->sortable() would work too.
                })
                ->searchable()
                ->excludeFromColumnSelect()
                ->footer($this->getFilterByKey('name')),

            Column::make('NameLabel')
            ->label(function ($row) {
              return $row->name;
            })
            ->sortable(function(Builder $query, string $direction) {
              return $query->orderBy('users.name', $direction);
            }),

            Column::make('Parent', 'parent.name'),

            Column::make('Success Rate')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('success_rate', $direction); // Example, ->sortable() would work too.
            })
            ->searchable()
            ->collapseOnTablet(),

            Column::make('E-Mail', 'email')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('email', $direction); // Example, ->sortable() would work too.
            })
            ->searchable(),

            Column::make('Verified At', 'email_verified_at')
            ->sortable()
            ->searchable()
            ->collapseOnTablet()
            ->format(
                fn ($value, $row, Column $column) => Carbon::parse($value)->format('d M Y')
            ),

            Column::make('Address', 'address.address')
            ->sortable()
            ->searchable()
            ->collapseOnTablet()
            ->footer(function($rows) {
                return 'Count: ' . $rows->count(). ' of ' . $this->paginationTotalItemCount;
            }),

            Column::make('Address Group', 'address.group.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),

            Column::make('Group City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),

            BooleanColumn::make('Active')
                ->sortable()
                ->collapseOnMobile()
                ->footerFilter('active'),

            Column::make('Group City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),

            Column::make('Tags')
                ->label(fn ($row) => $row->tags->pluck('name')->implode(', ')),


            ButtonGroupColumn::make('Actions')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('My Link 1')
                        ->title(fn ($row) => 'Link 1')
                        ->location(fn ($row) => 'https://'.$row->id.'google1.com')
                        ->attributes(function ($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                    LinkColumn::make('My Link 2')
                        ->title(fn ($row) => 'Link 2')
                        ->location(fn ($row) => 'https://'.$row->id.'google2.com')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                    LinkColumn::make('My Link 3')
                        ->title(fn ($row) => 'Link 3')
                        ->location(fn ($row) => 'https://'.$row->id.'google3.com')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                ]),
        ];
    }

    public function filters(): array
    {
        return [

            SelectFilter::make('UserFilter')
            ->options(User::select('name','id')->get()->pluck('name','id')->toArray()),

            SelectFilter::make('TagFilter')
            ->options([]),

            TextFilter::make('Name')
                ->config([
                    'maxlength' => 10,
                    'placeholder' => 'Search Name',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.name', 'like', '%'.$value.'%');
                })
                ->hiddenFromMenus(),

            TextFilter::make('Email')
                ->config([
                    'maxlength' => 10,
                    'placeholder' => 'Search Email',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.email', 'like', '%'.$value.'%');
                })
                ->hiddenFromMenus(),
                NumberRangeFilter::make('Success Rate')
                ->options(
                    [
                        'min' => 0,
                        'max' => 100,
                    ]
                )
                ->config([
                    'minRange' => 0,
                    'maxRange' => 100,
                    'suffix' => '%',
                ])
                ->filter(function (Builder $builder, array $values) {
                    $builder->where('users.success_rate', '>=', intval($values['min']))
                    ->where('users.success_rate', '<=', intval($values['max']));
                }),
            MultiSelectFilter::make('Tags')
            ->options(
                Cache::remember('allTags', 600, function () {
                    return Tag::select('id', 'name', 'created_at')->orderBy('name')
                    ->get()
                    ->pluck('name','id')->toArray();
                })
            )->filter(function (Builder $builder, array $values) {
                $builder->whereHas('tags', fn ($query) => $query->whereIn('tags.id', $values));
            })
            ->setFirstOption("I don't care")
            ->setFilterPillValues([
                '3' => 'Tag 1',
            ]),


            DateRangeFilter::make('EMail Verified Range')
            ->config([
                'ariaDateFormat' => 'F j, Y',
                'dateFormat' => 'Y-m-d',
                'earliestDate' => '2020-01-01',
                'latestDate' => '2023-08-01',
            ])
            ->setFilterPillValues([0 => 'minDate', 1 => 'maxDate'])
            ->filter(function (Builder $builder, array $dateRange) {
                $builder->whereDate('users.email_verified_at', '>=', $dateRange['minDate'])->whereDate('users.email_verified_at', '<=', $dateRange['maxDate']);
            }),

            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->setCustomFilterLabel('includes.customFilterLabel1')
                ->setFilterPillBlade('includes.customFilterPills2')
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('users.email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('users.email_verified_at');
                    }
                }),
                    
                SelectFilter::make('Active')
                    ->setFilterSlidedownRow(2)
                    ->setFilterSlidedownColspan(2)
                    ->setFilterPillTitle('User Status')
                    ->setFilterPillValues([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->options([
                        '' => 'All',
                        '1' => 'Yes',
                        '0' => 'No',
                    ])
                    ->filter(function (Builder $builder, string $value) {
                        if ($value === '1') {
                            $builder->where('users.active', true);
                        } elseif ($value === '0') {
                            $builder->where('users.active', false);
                        }
                    })
                    ->hiddenFromAll(),
            
                DateFilter::make('Verified From')
                    ->config([
                        'min' => '2023-07-01',
                        'max' => '2023-12-01',
                        'pillFormat' => 'd-m-Y'
                    ])
                    ->filter(function (Builder $builder, string $value) {
                        $builder->whereDate('users.email_verified_at', '>=', $value);
                    })
                    //->setFilterDefaultValue('2023-07-01')
                    ->setFilterSlidedownRow(2)
                    ->setFilterSlidedownColspan("2"),

                DateTimeFilter::make('Verified To')
                ->config([
                    'pillFormat' => 'd-m-Y H:i'
                ])
                    ->filter(function (Builder $builder, string $value) {
                        $builder->where('users.email_verified_at', '<=', $value);
                    })->setFilterSlidedownRow(3)
                    ->setFilterSlidedownColspan(2)
                   // ->setFilterDefaultValue('2023-07-04T01:17')
                    ->setFilterPillBlade('includes.customFilterPillBlade'),

                TextFilter::make('Email5')
                ->setFilterPillTitle('User Email')
                ->setCustomFilterLabel('includes.customFilterLabel2')
                ->config([
                    'maxlength' => 10,
                    'placeholder' => 'Search Email',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.email', 'like', '%'.$value.'%');
                })->setFilterSlidedownRow("2"),
            ];
    }

    public function filters2(): array
    {
        return [

            
                DateFilter::make('Verified From')
                    ->config([
                        'min' => '2023-07-01',
                        'max' => '2023-12-01',
                        'pillFormat' => 'd-m-Y'
                    ])
                    ->filter(function (Builder $builder, string $value) {
                        $builder->whereDate('users.email_verified_at', '>=', $value);
                    })
                    //->setFilterDefaultValue('2023-07-01')
                    ->setFilterSlidedownRow(2)
                    ->setFilterSlidedownColspan("2"),

                    DateTimeFilter::make('Verified To')
                    ->config([
                        'pillFormat' => 'd-m-Y H:i'
                    ])
                        ->filter(function (Builder $builder, string $value) {
                            $builder->where('users.email_verified_at', '<=', $value);
                        })->setFilterSlidedownRow(3)
                        ->setFilterSlidedownColspan(2)
                       // ->setFilterDefaultValue('2023-07-04T01:17')
                        ->setFilterPillBlade('includes.customFilterPillBlade'),
                        
                    TextFilter::make('User Namesss', 'user_name_filter')
                    //->setFilterAttributes([
                   //     'class' => 'bg-red-500',
                   //     'default' => false,
                   // ])
                    ->filter(function (Builder $builder, string $value) {
                        return $builder->where('users.name', '=', $value);
                    }),
        
        ];
    }

    public function builder(): Builder
    {
        return User::with(['tags:id,name']);
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $users = $this->getSelected();

        $this->clearSelected();
        dd($users);
                //return Excel::download(new UsersExport($users), 'users.xlsx');
    }

    public function activate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => false]);

        $this->clearSelected();
    }

    public function reorder($items): void
    {
        foreach ($items as $item) {
            User::find((int) $item['value'])->update(['sort' => (int) $item['order']]);
        }
    }

    public function rendering()
    {
        if(method_exists(parent::class, 'rendering'))
        {
            parent::rendering();
        }
    
       // $this->updateFilterOptions();

    }



}
