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
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Illuminate\Support\Facades\Storage;

class UsersTable extends DataTableComponent
{
    use testTrait;

    public $myParam = 'Default';


    public string $tableName = 'users2';

    public array $users1 = [];

    public array $allTags = [];

    public string $filterLayout = 'popover';

    public array $fileList;

    public function configure(): void
    {
        //$userExample->tags()->sync(Tag::inRandomOrder()->take(rand(1,3))->get()->pluck('tags.id')->toArray());
        //$user = User::findOrFail(1);
        //$user->jsoncol = ['test' => 'test123', 'new' => ''];
        //$user->save();
        //$this->userExample
        //(Tag::inRandomOrder()->take(rand(1,3))->get()->toArray());
        $this->setPrimaryKey('id')
            ->setDebugEnabled()
            ->setAdditionalSelects(['users.id as id', 'users.rule'])
            ->setFilterLayout($this->filterLayout)
            ->setConfigurableAreas([
                'toolbar-left-start' => ['includes.areas.toolbar-left-start', ['param1' => $this->myParam, 'param2' => ['param2' => 2]]],
            ])
            ->setReorderEnabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
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
                if ($column->isField('id') || $column->isField('address.address')) {
                    return ['class' => 'text-red-500'];
                }
                else if ($column->isHidden())
                {
                    return ['class' => 'invisible',
                    'default' => false];
                }
                else return ['default' => true];
            })
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setTableRowUrl(function ($row) {
                return 'https://google-'.$row->id.'.com';
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_blank';
            })->setEagerLoadAllRelationsDisabled();

        if (empty($this->allTags))
        {
            $this->allTags = Tag::select('id', 'name', 'created_at')
            ->orderBy('name')
            ->get()
            ->pluck('name','id')->toArray();
        }
    }

    public function columns(): array
    {
        return [
                Column::make('Order', 'sort')
                ->sortable()
                ->collapseOnMobile()
                ->excludeFromColumnSelect(),

                ImageColumn::make('Avatar')
                ->location(
                    fn($row) => 'storage/avatars/' . $row->id . '.jpg'
                )
                ->attributes(fn($row) => [
                    'class' => 'rounded-full',
                    'alt' => $row->name . ' Avatar',
                ])->excludeFromColumnSelect(),

            Column::make('Name')
                ->sortable(function (Builder $query, string $direction) {
                    return $query->orderBy('name', $direction); // Example, ->sortable() would work too.
                })
                ->searchable()
                ->secondaryHeader($this->getFilterByKey('name'))
                ->footer($this->getFilterByKey('name'))->excludeFromColumnSelect(),

            Column::make('Name Label')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('name', $direction); // Example, ->sortable() would work too.
            })
            ->label(fn($row, Column $column) => $row->name),

            Column::make('Parent', 'parent_id')
                ->format(fn($value, $row, Column $column) => ((!empty($row->parent)) ? $row->parent->name : '<strong>None</strong>'))->html(),

    
            Column::make('E-Mail', 'email')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('email', $direction); // Example, ->sortable() would work too.
            })
            ->searchable()
            ->secondaryHeader($this->getFilterByKey('email')),

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
                return 'Count: ' . $rows->count();
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
                ->secondaryHeaderFilter('active')
                ->footerFilter('active'),

            Column::make('Group City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),

            Column::make('Tags')
                ->label(fn ($row) => $row->tags->pluck('name')->implode(', ')),
            Column::make('Rules')
            ->label(
                    fn($row, Column $column) => (is_array($row->rule) ? (array_key_exists('comment', $row->rule) ? $row->rule['comment'] : 'ArrayExistsNoKey') : 'NotAnArray'),
            ),
            Column::make('jsoncol')
            ->label(
                fn($row, Column $column) => $row->jsoncol['test'] ?? ''
            ),
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

            MultiSelectFilter::make('Tags')
            ->options(
                $this->allTags
            )->filter(function (Builder $builder, array $values) {
                $builder->whereHas('tags', fn ($query) => $query->whereIn('tags.id', $values));
            })
            ->setFilterPillValues([
                '3' => 'Tag 1',
            ]),
            
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
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
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
                            $builder->where('active', true);
                        } elseif ($value === '0') {
                            $builder->where('active', false);
                        }
                    })
                    ->hiddenFromAll(),
            
                DateFilter::make('Verified From')
                    ->config([
                        'min' => '2020-01-01',
                        'max' => '2021-12-31',
                    ])
                    ->filter(function (Builder $builder, string $value) {
                        $builder->whereDate('email_verified_at', '>=', $value);
                    })
                    ->setFilterSlidedownRow(2)
                    ->setFilterSlidedownColspan("2"),

                DateFilter::make('Verified To')
                    ->filter(function (Builder $builder, string $value) {
                        $builder->where('email_verified_at', '<=', $value);
                    })->setFilterSlidedownRow(3)
                    ->setFilterSlidedownColspan(2)
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

    public function builder(): Builder
    {
        return User::query()->with(['tags:id,name', 'parent:id,name']);
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

        return Excel::download(new UsersExport($users), 'users.xlsx');
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


}
