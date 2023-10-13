<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class NewPage extends Component
{
    use DemoTrait;


    public function mount()
    {
        if (!isset($this->theme))
        {
            $this->theme ="tw3";
        }
        $this->setTableTheme($this->theme);        
    }



    public function render()
    {
        return view('page.tablecomponent')->layout('layouts.'.$this->theme);
    }
}
