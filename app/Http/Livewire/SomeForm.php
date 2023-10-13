<?php

namespace App\Http\Livewire;

use Livewire\Form;
use Livewire\Attributes\Locked;

class SomeForm extends Form 
{
    #[Locked]  
    public ?string $id = null;
    
    public string $foo = '';

    #[Locked]  
    public array $deepLocked = ['deep1' => 'test12323'];

    public function init(?string $id) {
        $this->id = $id;
    }

}
