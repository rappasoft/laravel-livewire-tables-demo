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
        $this->originalTheme = 'bs4';
        $this->setTableTheme('bs4');        
    }

    public function render()
    {
        return view('page.tablecomponent')->layout('layouts.bs4');
    
    }
}
