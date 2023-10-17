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
        $this->setTableTheme($this->theme);        
        if (empty($this->availableLocales))
        {
            $this->availableLocales = config('app.available_locales');
        }
        $this->checkAndUpdateChosenLocale($this->chosenLocale);

    }


    public function render()
    {

        return view('page.tablecomponent')->layout('layouts.'.$this->theme);
    }
}
