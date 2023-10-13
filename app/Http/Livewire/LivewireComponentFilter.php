<?php

namespace Rappasoft\LaravelLivewireTables\Views\Filters;

use Rappasoft\LaravelLivewireTables\Views\Filter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class LivewireComponentFilter extends Filter
{
    public string $filterComponentPath = '';
    public array $filterComponentOptions = [];

    public function validate(mixed $value): mixed
    {
        return $value;
    }

    public function isEmpty($value): bool
    {
        return $value === '';
    }

    /**
     * Gets the Default Value for this Filter via the Component
     */
    public function getFilterDefaultValue(): ?string
    {
        return $this->filterDefaultValue ?? null;
    }

    public function setFilterComponentPath(string $filterComponentPath): self
    {
        $this->filterComponentPath = (Str::startsWith($filterComponentPath, 'livewire:')) ? substr($filterComponentPath, 9) : $filterComponentPath;

        return $this;
    }


    public function render(string $filterLayout, string $tableName, bool $isTailwind, bool $isBootstrap4, bool $isBootstrap5): string|\Illuminate\Contracts\Foundation\Application|\Illuminate\View\View|\Illuminate\View\Factory
    {
        return view('livewire-tables::components.tools.filters.livewire-component-filter',  [
            'wireKeyValue' => 'livewireComponentFilter-'.$this->getFilterKey(),
            'livewireComponent' => $this->filterComponentPath,
            'modelableValue' => 'filterComponents.'.$this->getFilterKey(),
            ...$this->filterComponentOptions,
        ]);



    }
}
