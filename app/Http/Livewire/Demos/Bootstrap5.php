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
        $this->originalTheme = 'bs5';
        $this->setTableTheme('bs5');        
    }

    public function render()
    {

        return view('page.tablecomponent')->layout('layouts.bs5');
    
    }
}
