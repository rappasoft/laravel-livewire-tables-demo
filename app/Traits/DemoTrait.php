<?php

namespace App\Traits;

use Livewire\Attributes\Url;

trait DemoTrait {
 
    
    #[Url(as: 'filter-layout', keep: true)]
    public string $filterLayout = 'popover';

    public $filterDemoKey = '';

    #[Url(as: 'selected-table', keep: true)]
    public $selectedTable = 'news-table';

    #[Url(as: 'theme', keep: true)]
    public string $theme = 'tw2';

    public string $tableTheme = 'tailwind';

}
