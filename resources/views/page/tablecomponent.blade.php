<div style="margin-top: 5em;">
@include('includes.sections.header.demoControls')
    
    <div class="h-screen" wire:key="{{ $filterDemoKey }}-wrapper">
        <livewire:dynamic-component :key="$filterDemoKey" :is="$selectedTable" theme="{{ $tableTheme }}" filterLayout="{{ $filterLayout }}" />
    </div>
</div>
