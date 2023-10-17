<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;

class OtherComponent extends Component
{

    #[Url(keep: false, history: false, as: 'othercomponentsearch')]
    public ?string $search = null;

    public $otherelement;

    public function render()
    {
        return view('livewire.other-component');
    }
}
