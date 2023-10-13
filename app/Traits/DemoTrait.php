<?php

namespace App\Traits;

use Livewire\Attributes\Url;

trait DemoTrait {
 
    public string $originalTheme;

    #[Url(as: 'filter-layout', keep: true)]
    public string $filterLayout = 'popover';

    public $filterDemoKey = '';

    #[Url(as: 'selected-table', keep: true)]
    public $selectedTable = 'news-table';

    #[Url(as: 'theme', keep: true)]
    public string $theme = 'tw2';

    public string $tableTheme = 'tailwind';


    public function updatedTheme(string $theme)
    {
        $this->setTableTheme($theme);        

    }

    public function setTableTheme(string $theme)
    {
        $this->theme = $theme;

        if ($theme == "tw2")
        {
            $this->tableTheme = "tailwind";
        }
        else if ($theme == "bs4")
        {
            $this->tableTheme = "bootstrap-4";
        }
        else if ($theme == "bs5")
        {
            $this->tableTheme = "bootstrap-5";
        }
        else
        {
            $this->tableTheme = "tailwind";
        }
    }

    public function setFilterDemoKey()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;
    }

    public function rendering()
    {
        $this->setFilterDemoKey();
    }
}
