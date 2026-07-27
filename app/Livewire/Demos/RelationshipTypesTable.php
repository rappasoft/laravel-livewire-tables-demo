<?php

namespace App\Livewire\Demos;

use Livewire\Component;

/**
 * Demo page for Relationship Types (hasOne, belongsTo, hasMany, belongsToMany, nested)
 * 
 * This showcases how to display different relationship types in table columns.
 */
class RelationshipTypesTable extends Component
{
    public function render()
    {
        return view('livewire.demos.relationship-types')
            ->layout('layouts.feature-demo', [
                'title' => 'Relationship Types',
                'badge' => 'New in v4.0',
                'description' => 'Display data from all relationship types: hasOne, belongsTo, hasMany, belongsToMany, and nested relationships.',
                'code' => "Column::make('Articles', 'articles')->displayField('title')",
                'gradient' => 'from-indigo-500 to-purple-600',
            ]);
    }
}



