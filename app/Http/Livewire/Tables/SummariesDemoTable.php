<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class SummariesDemoTable extends DataTableComponent
{
    public string $tableName = 'summaries-demo';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100 dark:bg-gray-800 font-semibold'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                return ['class' => 'px-4 py-2'];
            });
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Name')
                ->config([
                    'placeholder' => 'Search Name',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('name', 'like', '%' . $value . '%');
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->footer(function ($rows) {
                    return '<strong>Count: ' . $rows->count() . '</strong>';
                })
                ->html(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->footer(function ($rows) {
                    return '<strong>Summary Row →</strong>';
                })
                ->html(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Success Rate', 'success_rate')
                ->sortable()
                ->format(fn($value) => ($value ?? 0) . '%')
                ->footer(function ($rows) {
                    $avg = round($rows->avg('success_rate') ?? 0, 1);
                    return '<strong>Avg: ' . $avg . '%</strong>';
                })
                ->html(),

            Column::make('Sort Order', 'sort')
                ->sortable()
                ->footer(function ($rows) {
                    return '<strong>Sum: ' . $rows->sum('sort') . '</strong>';
                })
                ->html(),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
