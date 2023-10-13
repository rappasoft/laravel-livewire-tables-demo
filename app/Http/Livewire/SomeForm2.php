<?php

namespace App\Http\Livewire;

use Livewire\Form;
use Livewire\Attributes\Locked;

class SomeForm2 extends Form 
{
    #[Locked]  
    public ?string $id = null;
    
    public string $foo = '';

    public function init(?string $id) {
        $this->id = $id;
    }

}
