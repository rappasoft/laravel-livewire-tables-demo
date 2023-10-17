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
        $this->originalTheme = 'tw2';
        $this->setTableTheme('tw2');        
    }

    public function render()
    {
        return view('page.tablecomponent')->layout('layouts.tw2');
    }
}
