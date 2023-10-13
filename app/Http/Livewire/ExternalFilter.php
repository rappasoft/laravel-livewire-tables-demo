<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;

class ExternalFilter extends Component
{
    #[Modelable] 
    public $value = '';

    public function updatedValue($newVal)
    {
        $this->dispatch('update-the-filter'); 
    }

    public function save()
    {
        //echo 'test';
    }
    
    public function render()
    {
        return view('livewire.external-filter');
    }
}
