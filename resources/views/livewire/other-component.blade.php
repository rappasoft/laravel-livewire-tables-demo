<div class="bg-slate-100 dark:bg-slate-800 rounded-lg p-4 mb-6 border border-slate-200 dark:border-slate-700">
    <div class="flex flex-wrap items-center gap-3">
        <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Event Demo:</span>
        
        <div class="flex flex-wrap gap-2">
            <button class="px-3 py-1.5 text-xs font-medium bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-600 transition-colors text-slate-700 dark:text-slate-200" wire:click="$emit('setSort', 'name', 'asc')">Sort ↑</button>
            <button class="px-3 py-1.5 text-xs font-medium bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-600 transition-colors text-slate-700 dark:text-slate-200" wire:click="$emit('setSort', 'name', 'desc')">Sort ↓</button>
            <button class="px-3 py-1.5 text-xs font-medium bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-600 transition-colors text-slate-700 dark:text-slate-200" wire:click="$emit('clearSorts')">Clear Sorts</button>
        </div>

        <div class="h-6 w-px bg-slate-300 dark:bg-slate-600 hidden md:block"></div>

        <div class="flex flex-wrap gap-2">
            <button class="px-3 py-1.5 text-xs font-medium bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition-colors text-green-700 dark:text-green-200" wire:click="$emit('setFilter', 'active', '1')">Active: Yes</button>
            <button class="px-3 py-1.5 text-xs font-medium bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-700 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition-colors text-red-700 dark:text-red-200" wire:click="$emit('setFilter', 'active', '0')">Active: No</button>
            <button class="px-3 py-1.5 text-xs font-medium bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-600 transition-colors text-slate-700 dark:text-slate-200" wire:click="$emit('clearFilters')">Clear Filters</button>
        </div>

        <div class="h-6 w-px bg-slate-300 dark:bg-slate-600 hidden md:block"></div>

        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-500 dark:text-slate-400">Search:</span>
            <input type="text" wire:key="randomsearchthing" wire:model.live="search" placeholder="External search..." class="px-3 py-1.5 text-sm border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-32" />
        </div>
    </div>
</div>
