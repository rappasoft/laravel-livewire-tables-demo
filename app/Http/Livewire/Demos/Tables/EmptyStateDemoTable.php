<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmptyStateDemoTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            ->setSearch('xyznonexistent123') // Pre-fill search with non-matching term
            ->emptyStateHeading('No Users Found')
            ->emptyStateDescription('We couldn\'t find any users matching your search criteria. Try adjusting your search or removing some filters to see more results.');
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

            Column::make('Active', 'active')
                ->sortable()
                ->format(fn($value) => $value ? '✓ Active' : '✗ Inactive'),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
