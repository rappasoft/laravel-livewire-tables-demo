<?php

namespace App\Http\Livewire\Demos;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Traits\DemoTrait;

class NewPage extends Component
{
    use DemoTrait;

    public string $originalTheme;

    public function mount()
    {
        if (!isset($this->theme))
        {
            $this->theme ="tw3";
        }
        $this->originalTheme = $this->theme;
        $this->setTableTheme($this->theme);        
    }

    public function updatedTheme(string $theme)
    {
        $this->setTableTheme($theme);        

    }

    public function setTableTheme(string $theme)
    {
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

    public function render()
    {
        $this->filterDemoKey = $this->selectedTable.'-'.$this->filterLayout.'-'.$this->theme;

        if ($this->originalTheme != $this->theme)
        {
            $this->originalTheme = $this->theme;
            return request()->header('Referer');
            
            return view('page.tablecomponent')->layout('layouts.'.$this->theme)
            ->response(function(Response $response) {
                $response->header('Refresh','5');
            });

        }
        else
        {
            return view('page.tablecomponent')->layout('layouts.'.$this->theme);

        }
        
    }
}
