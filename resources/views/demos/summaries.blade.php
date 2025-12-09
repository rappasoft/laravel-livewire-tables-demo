<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">SummariesTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->setFooterEnabled()           // Enable footer row
        ->setUseHeaderAsFooterEnabled(); // Use header style
}

public function columns(): array
{
    return [
        Column::make('ID', 'id')
            ->footer(fn($rows) => 'Count: ' . $rows->count()),

        Column::make('Success Rate', 'success_rate')
            ->footer(fn($rows) => 'Avg: ' . round($rows->avg('success_rate'), 1) . '%'),

        Column::make('Sort Order', 'sort')
            ->footer(fn($rows) => 'Sum: ' . $rows->sum('sort')),
    ];
}</code></pre>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">count()</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">Total rows</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">sum()</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">Add all values</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="text-2xl font-bold text-green-600 dark:text-green-400">avg()</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">Average value</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">min()</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">Lowest value</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <div class="text-2xl font-bold text-red-600 dark:text-red-400">max()</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">Highest value</div>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Look at the footer row to see calculated summary values (Count, Average, Sum)</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.summaries-demo-table />
        </div>
    </div>
</div>
