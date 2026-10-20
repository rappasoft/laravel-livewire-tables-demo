<div>
    <div class="card mb-4">
        <div class="card-body d-flex flex-wrap align-items-end" style="gap: 1.5rem">
            <div>
                <label for="demo-table" class="d-block">Table</label>
                @include('includes.sections.header.controls.tableSwitcher', ['controlClass' => 'form-control'])
            </div>
            <div>
                <label for="demo-filters" class="d-block">Filters</label>
                @include('includes.sections.header.controls.filterSwitcher', ['controlClass' => 'form-control'])
            </div>
            <div>
                <label for="demo-locale" class="d-block">Locale</label>
                @include('includes.sections.header.controls.localeSwitcher', ['controlClass' => 'form-control'])
            </div>
        </div>
    </div>
    <div class="card" wire:key="{{ $filterDemoKey }}-wrapper">
        <div class="card-body">
            <livewire:dynamic-component :key="$filterDemoKey" :is="$selectedTable" theme="{{ $tableTheme }}" filterLayout="{{ $filterLayout }}" />
        </div>
    </div>
</div>
