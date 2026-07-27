<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Tailwind4 extends Component
{
    use DemoTrait;

    public function mount()
    {
        $this->originalTheme = 'tw4';
        $this->setTableTheme('tw4');
    }

    public function render()
    {
        return view('page.tablecomponent')->layout('layouts.tw4');

    }
}
