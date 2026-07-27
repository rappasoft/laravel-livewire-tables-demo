<?php

namespace App\Livewire\Demos;

use Livewire\Component;

class PollingTable extends Component
{
    public function render()
    {
        return view('demos.polling')
            ->layout('layouts.feature-demo', [
                'title' => 'Refreshing / Polling',
                'badge' => 'v3',
                'description' => 'Auto-refresh your tables on an interval given in milliseconds, or only while the tab is visible / kept alive.',
                'code' => '$this->setRefreshTime(10000)',
                'gradient' => 'from-green-500 to-emerald-600',
            ]);
    }
}
