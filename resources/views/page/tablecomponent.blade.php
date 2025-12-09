<div>
    @include('includes.sections.header.demoControls')
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" wire:key="{{ $filterDemoKey }}-wrapper">
        <livewire:dynamic-component :key="$filterDemoKey" :is="$selectedTable" theme="{{ $tableTheme }}" filterLayout="{{ $filterLayout }}" />
    </div>
</div>
