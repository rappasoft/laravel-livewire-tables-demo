<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;

class TestLocked extends Component
{

    #[Locked]  
    public string $projectID = '';

    public array $tester = ["file", "test"];

    #[Locked]  
    public SomeForm2 $form2;

    public array $updatedFields = [];

    public SomeForm $form;

    public function updated($key, $val)
    {
        $this->updatedFields[] = $key;
    }

    public function mount()
    {
        $this->projectID = '123';
        $this->form->init('id');
        $this->tester['file'] = "Test";
        $this->form2->init('id2');

    }

    public function render()
    {
        

        return <<< 'HTML'
        <div>
            <input type='text' wire:model.live='projectID' />
            <input type='text' wire:model.live='form.id' />
            <input type='text' wire:model.live='form.foo' />
            <input type='text' wire:model.live='tester.file' />
            <input type='text' wire:model.live='form2.foo' />
            <input type='text' wire:model.live='form.deepLocked.deep1' />

        </div>
        HTML;
        
    }

}
