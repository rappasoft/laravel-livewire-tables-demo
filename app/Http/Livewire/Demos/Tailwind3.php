<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Tailwind3 extends Component
{
    use DemoTrait;

    public function mount()
    {
        $this->originalTheme = 'tw3';
        $this->setTableTheme('tw3');        
    }

    public function render()
    {
        return view('page.tablecomponent')->layout('layouts.tw3');
    
    }
}
