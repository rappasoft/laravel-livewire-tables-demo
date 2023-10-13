<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;

class PageComponent extends Component
{

    public function render()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;

        return view('page.tablecomponent')
    
    }
}
