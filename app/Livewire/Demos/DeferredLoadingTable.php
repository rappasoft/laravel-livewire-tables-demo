<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class DeferredLoadingTable extends Component
{
    public function render()
    {
        return view('demos.deferred')
            ->layout('layouts.feature-demo', [
                'title' => 'Deferred Loading',
                'badge' => 'New in v4.0',
                'description' => 'Improve initial page load times by loading table data asynchronously after the page renders.',
                'code' => "\$this->deferLoading()",
                'gradient' => 'from-blue-500 to-cyan-600',
            ]);
    }
}
