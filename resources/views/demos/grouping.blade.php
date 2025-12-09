<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">GroupingDemoTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->groupBy('active')        // Group rows by the 'active' column
        ->groupsExpanded();        // Start with all groups expanded
}

public function columns(): array
{
    return [
        Column::make('ID', 'id')->sortable(),
        Column::make('Name', 'name')->sortable()->searchable(),
        Column::make('Email', 'email')->sortable()->searchable(),
        BooleanColumn::make('Active', 'active')->sortable(),
    ];
}</code></pre>
    </div>

    <!-- Features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <div class="font-semibold">Visual Group Headers</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">Click to expand/collapse</div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <div>
                    <div class="font-semibold">Collapsible Groups</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">groupsCollapsed()</div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div>
                    <div class="font-semibold">Row Counts</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">Shows items per group</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Explanation -->
    <div class="mb-8 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 rounded-xl p-6 border border-yellow-200 dark:border-yellow-800">
        <h3 class="font-semibold text-lg text-yellow-900 dark:text-yellow-100 mb-4">True Row Grouping</h3>
        <div class="space-y-4">
            <p class="text-yellow-800 dark:text-yellow-200">
                Unlike simple sorting, row grouping creates visual group headers that organize rows by a common value. 
                Each group shows a header with the group label and row count. Click the header to expand or collapse the group.
            </p>
            <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-yellow-200 dark:border-yellow-700">
                <div class="flex items-center space-x-2 text-sm">
                    <span class="font-semibold text-yellow-900 dark:text-yellow-100">Active: true</span>
                    <span class="text-yellow-600 dark:text-yellow-400">(12 items)</span>
                    <span class="text-yellow-500">→</span>
                    <span class="text-yellow-700 dark:text-yellow-300">Group header with expand/collapse</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Users grouped by Active status - click group headers to expand/collapse</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.grouping-demo-table />
        </div>
    </div>
</div>
