<div>
    @include('includes.sections.header.demoControls')

    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden" wire:key="{{ $filterDemoKey }}-wrapper">
        <div class="p-4">
            <livewire:dynamic-component :key="$filterDemoKey" :is="$selectedTable" theme="{{ $tableTheme }}" filterLayout="{{ $filterLayout }}" />
        </div>
    </div>
</div>
