<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PollingDemoTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            ->poll('10s');
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

            Column::make('Last Updated')
                ->label(fn($row) => '<span class="text-green-600 dark:text-green-400 font-mono">' . now()->format('H:i:s') . '</span>')
                ->html(),

            Column::make('Active', 'active')
                ->sortable()
                ->format(fn($value) => $value ? '✓' : '✗'),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}

