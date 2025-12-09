<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class GroupingDemoTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([25, 50, 100])
            ->setPerPage(25)
            ->groupBy('active')
            ->groupsExpanded();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Success Rate', 'success_rate')
                ->sortable()
                ->format(fn($value) => ($value ?? 0) . '%'),

            BooleanColumn::make('Active', 'active')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
