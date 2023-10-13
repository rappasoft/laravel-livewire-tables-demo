<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Tailwind2 extends Component
{
    use DemoTrait;

    public function mount()
    {
        $this->theme = 'tw2';
        $this->tableTheme = 'tailwind';
    }

    public function render()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;

        return view('page.tablecomponent')->layout('layouts.tw2');
    
    }
}
