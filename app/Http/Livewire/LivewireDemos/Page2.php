<?php

namespace App\Http\Livewire\LivewireDemos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class Page2 extends Component
{

    public function mount()
    {
    }

    public function render()
    {

        return view('page.livewiredemos.page2');
    
    }
}
