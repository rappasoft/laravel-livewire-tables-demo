<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class PollingTable extends Component
{
    public function render()
    {
        return view('demos.polling')
            ->layout('layouts.feature-demo', [
                'title' => 'Enhanced Polling',
                'badge' => 'New in v4.0',
                'description' => 'Auto-refresh your tables with human-readable time intervals like 10s, 30s, 1m, or 5m.',
                'code' => "\$this->poll('10s')",
                'gradient' => 'from-green-500 to-emerald-600',
            ]);
    }
}
