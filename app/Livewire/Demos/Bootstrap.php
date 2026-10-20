<?php

namespace App\Livewire\Demos;

use App\Traits\DemoTrait;
use Livewire\Component;

class Bootstrap extends Component
{
    use DemoTrait;

    public function mount(string $version): void
    {
        $this->originalTheme = 'bs'.$version;
        $this->setTableTheme($this->originalTheme);
    }

    public function render()
    {
        return view('page.bootstrap')->layout('layouts.bootstrap', [
            'version' => $this->originalTheme === 'bs4' ? '4' : '5',
        ]);
    }
}
