<?php

namespace App\Traits;

use Livewire\Attributes\Url;
use Illuminate\Support\Facades\App;

trait DemoTrait {
 
    public string $originalTheme;

    #[Url(as: 'filter-layout', keep: true)]
    public string $filterLayout = 'popover';

    public $filterDemoKey = '';

    #[Url(as: 'selected-table', keep: true)]
    public $selectedTable = 'news-table';

    #[Url(as: 'theme', keep: true)]
    public string $theme = 'tw3';

    #[Url(as: 'tableTheme', keep: true)]
    public string $tableTheme = 'tailwind';

    #[Url(as: 'chosenLocale', keep: true)]
    public string $chosenLocale = 'en';

    public array $availableLocales = [];


    public function updatedTheme(string $theme)
    {
        $this->setTableTheme($theme);        

    }

    public function updatedChosenLocale($val)
    {
        $this->checkAndUpdateChosenLocale($val);


    }

    public function checkAndUpdateChosenLocale($val)
    {
        if (in_array($val, $this->availableLocales))
        {
            App::setLocale($val);
        }

    }

    public function setTableTheme(string $theme)
    {
        $this->theme = $theme;
        $this->tableTheme = "tailwind";

        if ($theme == "bs4")
        {
            $this->tableTheme = "bootstrap-4";
        }
        else if ($theme == "bs5")
        {
            $this->tableTheme = "bootstrap-5";
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
