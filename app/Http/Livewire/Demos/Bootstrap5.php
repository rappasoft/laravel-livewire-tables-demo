<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Bootstrap5 extends Component
{
    use DemoTrait;

    public function mount()
    {
        $this->theme = 'bs5';
        $this->tableTheme = 'bootstrap-5';
    }

    public function render()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;

        return view('page.tablecomponent')->layout('layouts.bs5');
    
    }
}
