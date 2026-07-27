<?php

namespace App\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DeferredDemoTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            // deferLoading() does not exist in v3 — the closest feature is the loading placeholder,
            // which is shown during requests rather than deferring the initial load.
            ->setLoadingPlaceholderEnabled();
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
                ->format(fn($value) => $value . '%'),

            Column::make('Active', 'active')
                ->sortable()
                ->format(fn($value) => $value ? '✓ Active' : '✗ Inactive'),
        ];
    }

    public function builder(): Builder
    {
        // Simulate a slow query for demo purposes
        // In production, this would be a complex query with joins
        return User::query();
    }
}

