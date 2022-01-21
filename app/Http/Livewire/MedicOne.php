<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MedicOne extends \Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable
{

    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),
            NumberColumn::name('sort')
                ->label('Sort'),
            Column::name('name')
                ->label('Name'),
            Column::name('email')
                ->label('E-mail'),
            Column::name('address.address')
                ->label('Address'),
            Column::name('address.group.name')
                ->label('Address Group'),
            Column::name('address.group.city.name')
                ->label('Group City'),
            BooleanColumn::name('active')
                ->label('Active'),
            BooleanColumn::name('email_verified_at')
                ->label('Email Verified'),
        ];
    }
}
