<?php

namespace App\Http\Livewire\Demos;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Demo table showcasing the new Summaries feature
 * 
 * Summaries allow you to display aggregate values (sum, avg, count, min, max)
 * at the bottom of columns.
 */
class SummariesTable extends Component
{
    public function render()
    {
        return view('demos.summaries')
            ->layout('layouts.feature-demo', [
                'title' => 'Column Summaries',
                'badge' => 'New in v4.0',
                'description' => 'Display aggregate values like sum, average, count, min, and max at the bottom of your table columns.',
                'code' => "Column::make('Age')->summary('avg')",
                'gradient' => 'from-purple-500 to-indigo-600',
            ]);
    }
}
