<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;

class EmptyStateTable extends Component
{
    public function render()
    {
        return view('demos.empty-state')
            ->layout('layouts.feature-demo', [
                'title' => 'Custom Empty State',
                'badge' => 'New in v4.0',
                'description' => 'Customize what users see when the table has no records to display.',
                'code' => "\$this->emptyStateHeading('No results')",
                'gradient' => 'from-orange-500 to-amber-600',
            ]);
    }
}
