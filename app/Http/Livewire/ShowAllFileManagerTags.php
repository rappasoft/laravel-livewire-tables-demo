<?php

namespace App\Http\Livewire;

use App\Models\FileTagManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ShowAllFileManagerTags extends Component
{
    public Collection $tags;

    public function mount(): void
    {
        $this->tags = FileTagManager::all();
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.show-all-file-manager-tags');
    }
}
