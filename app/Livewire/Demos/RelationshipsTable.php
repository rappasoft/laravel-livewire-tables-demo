<?php

namespace App\Livewire\Demos;

use Livewire\Component;

/**
 * Demo page for the new Relationship Aggregates feature
 * 
 * This showcases how to use counts(), sum(), avg(), min(), max()
 * methods on columns to display data from related models.
 */
class RelationshipsTable extends Component
{
    public function render()
    {
        return view('livewire.demos.relationships')
            ->layout('layouts.feature-demo', [
                'title' => 'Relationship Aggregates',
                'badge' => 'New in v4.0',
                'description' => 'Display counts, sums, averages, and more from related models directly in your table columns.',
                'code' => "Column::make('Posts', 'posts_count')->counts('posts')",
                'gradient' => 'from-cyan-500 to-teal-600',
            ]);
    }
}

