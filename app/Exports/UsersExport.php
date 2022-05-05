<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public $users;

    public function __construct($users) {
        $this->users = $users;
    }

    public function collection()
    {
        return User::whereIn('id', $this->users)->get();
    }
}