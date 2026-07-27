<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class GroupingTable extends Component
{
    public function render()
    {
        return view('demos.grouping')
            ->layout('layouts.feature-demo', [
                'title' => 'Row Grouping',
                'badge' => 'New in v4.0',
                'description' => 'Group table rows by column values with collapsible sections for better data organization.',
                'code' => "\$this->groupBy('status')",
                'gradient' => 'from-yellow-500 to-orange-600',
            ]);
    }
}
