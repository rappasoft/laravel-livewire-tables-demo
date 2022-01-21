<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTableV22 extends DataTableComponent
{
    public string $tableName = 'users2';
    public array $users2 = [];

    public function configure(): void
    {
        $this->setSingleSortingDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make('Sort')
                ->sortable()
                ->collapseOnMobile(),
            Column::make('Name')
                ->sortable(),
            Column::make('E-mail', 'email')
                ->sortable(),
            Column::make('Active')
                ->sortable()
                ->collapseOnMobile(),
            Column::make('Tags')
                ->label()
                ->collapseOnTablet(),
            Column::make('Verified', 'email_verified_at')
                ->sortable()
                ->collapseOnTablet(),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
