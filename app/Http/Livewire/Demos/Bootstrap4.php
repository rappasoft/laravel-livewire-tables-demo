<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Bootstrap4 extends Component
{
    use DemoTrait;

    public function mount()
    {
        $this->theme = 'bs4';
        $this->tableTheme = 'bootstrap-4';
    }

    public function render()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;

        return view('page.tablecomponent')->layout('layouts.bs4');
    
    }
}
