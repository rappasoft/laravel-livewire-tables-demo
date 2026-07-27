<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class GroupingTable extends Component
{
    public function render()
    {
        return view('demos.grouping')
            ->layout('layouts.feature-demo', [
                'title' => 'Sorting & Defaults',
                'badge' => 'New',
                'description' => 'Make any column sortable and keep related records together with a default sort applied before user interaction.',
                'code' => "\$this->setDefaultSort('active', 'desc') // v3 has no groupBy()",
                'gradient' => 'from-yellow-500 to-orange-600',
            ]);
    }
}
