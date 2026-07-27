<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class CustomRowClassesTable extends Component
{
    public function render()
    {
        return view('demos.row-classes')
            ->layout('layouts.feature-demo', [
                'title' => 'Dynamic Row Styling',
                'badge' => 'New',
                'description' => 'Apply conditional CSS classes to table rows based on record data for visual data highlighting.',
                'code' => "\$this->setTrAttributes(fn(\$row, \$index) => ['default' => true, 'class' => ...])",
                'gradient' => 'from-pink-500 to-rose-600',
            ]);
    }
}
