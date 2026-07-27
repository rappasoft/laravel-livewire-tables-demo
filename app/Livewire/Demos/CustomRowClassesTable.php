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
                'badge' => 'New in v4.0',
                'description' => 'Apply conditional CSS classes to table rows based on record data for visual data highlighting.',
                'code' => "\$this->recordClasses(fn(\$row) => ...)",
                'gradient' => 'from-pink-500 to-rose-600',
            ]);
    }
}
