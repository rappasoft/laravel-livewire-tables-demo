<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\DateFilter;

class UsersTableV2 extends DataTableComponent
{

    // protected $model = User::class;

    public string $tableName = 'users1';
    public array $users1 = [];

//    public array $bulkActions = [
//        'activate' => 'Activate',
//    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            // ->setDebugEnabled()
            ->setReorderEnabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            // ->setFilterLayoutSlideDown()
            ->setHideBulkActionsWhenEmptyEnabled();

//        $this->setBulkActions([
//            'activate' => 'Activate',
//        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('One off column')
                ->label(function($row, Column $column) {
                    return view('tables.cells.one-off')->withRow($row)->withColumn($column);
                }),
            Column::make('Order', 'sort')
                ->sortable()
                ->collapseOnMobile(),
            Column::make('ID', 'id')
                ->sortable()
                ->setSortingPillTitle('Key')
                ->setSortingPillDirections('0-9', '9-0'),
            Column::make('Name')
                ->sortable()
                ->searchable()
                ->view('tables.cells.actions'),
//                ->format(function($value) {
////                    return '<strong class="text-red-500">'.$value.'</strong>';
//                    return view('tables.cells.actions')->withValue($value);
//                }),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Address', 'address.address')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Address Group', 'address.group.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Group City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),

//            Column::make('Average Child Age', 'children.age:avg')
//                ->sortable()
//                ->collapseOnMobile(),
            BooleanColumn::make('Active')
                ->sortable()
                ->collapseOnMobile(),
//                ->setCallback(function($value) {
//                    return (bool)$value === false;
//                })
//                ->setSuccessValue(false),
//            Column::make('Tags')
//                ->label()
//                ->collapseOnTablet(),
            Column::make('Verified', 'email_verified_at')
                ->sortable()
                ->collapseOnTablet(),
                
            // TODO
            Column::make('Tags', 'tags.name')
                ->label(fn($row) => $row->tags->pluck('name')->implode(', '))
            
        ];
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Tags')
                ->options(
                    Tag::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($tag) => $tag->name)
                        ->toArray()
                )->filter(function(Builder $builder, array $values) {
                    $builder->whereHas('tags', fn($query) => $query->whereIn('tags.id', $values));
                })
                ->setFilterPillValues([
                    '3' => 'Tag 1',        
                ]),
            // SelectFilter::make('Filter 3', 'email_verified_at')
            //     ->options([
            //         ''    => 'Any',
            //         'yes' => 'Yes',
            //         'no'  => 'No',
            //     ]),
            // SelectFilter::make('Filter 4', 'email_verified_at')
            //     ->options([
            //         ''    => 'Any',
            //         'yes' => 'Yes',
            //         'no'  => 'No',
            //     ]),
            // SelectFilter::make('Filter 5', 'email_verified_at')
            //     ->options([
            //         ''    => 'Any',
            //         'yes' => 'Yes',
            //         'no'  => 'No',
            //     ]),
            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    ''    => 'Any',
                    'yes' => 'Yes',
                    'no'  => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            SelectFilter::make('Active')
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
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('active', true);
                    } elseif ($value === '0') {
                        $builder->where('active', false);
                    }
                }),
            DateFilter::make('Verified From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Verified To')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
            //  ->when($this->getAppliedFilter('active'), fn($query, $active) => $query->where('active', $active === '1'));
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
        ];
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
            User::find((int)$item['value'])->update(['sort' => (int)$item['order']]);
        }
    }
}
