<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class DeferredLoadingTable extends Component
{
    public function render()
    {
        return view('demos.deferred')
            ->layout('layouts.feature-demo', [
                'title' => 'Loading Placeholder',
                'badge' => 'v3',
                'description' => 'Show a placeholder while the table is fetching data. True deferred loading is handled by Livewire itself, not by the package.',
                'code' => "\$this->setLoadingPlaceholderEnabled()",
                'gradient' => 'from-blue-500 to-cyan-600',
            ]);
    }
}
