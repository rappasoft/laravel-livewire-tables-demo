<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class EmptyStateTable extends Component
{
    public function render()
    {
        return view('demos.empty-state')
            ->layout('layouts.feature-demo', [
                'title' => 'Custom Empty State',
                'badge' => 'New',
                'description' => 'Customize what users see when the table has no records to display.',
                'code' => "\$this->setEmptyMessage('No results')",
                'gradient' => 'from-orange-500 to-amber-600',
            ]);
    }
}
