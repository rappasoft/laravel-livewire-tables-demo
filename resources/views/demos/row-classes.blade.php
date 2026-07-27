<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">CustomRowClassesTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->setTrAttributes(function ($row, $index) {
            // Apply different classes based on success rate
            return [
                'default' => true, // keep the package's built-in row classes
                'class' => match (true) {
                    $row->success_rate >= 80 => 'bg-green-50 dark:bg-green-900/20',
                    $row->success_rate >= 50 => 'bg-yellow-50 dark:bg-yellow-900/20',
                    $row->success_rate >= 25 => 'bg-orange-50 dark:bg-orange-900/20',
                    default => 'bg-red-50 dark:bg-red-900/20',
                },
            ];
        });
}</code></pre>
    </div>

    <!-- v3 API note -->
    <div class="mb-8 p-4 rounded-lg border border-blue-200 dark:border-blue-800 bg-blue-50 dark:bg-blue-900/20">
        <h4 class="font-semibold text-blue-800 dark:text-blue-200 mb-1">Note on the v3 API</h4>
        <p class="text-sm text-blue-700 dark:text-blue-300">
            Row styling is done with <code class="font-mono">setTrAttributes(Closure $callback)</code>. The closure receives
            <code class="font-mono">($row, $index)</code> and must return an <strong>array</strong> of attributes rather than a
            class string. Set <code class="font-mono">'default' =&gt; true</code> to keep the package's built-in row classes
            (striping and hover); omit it or set it to <code class="font-mono">false</code> to replace them entirely.
            Passing a plain string or an array of classes is not supported.
        </p>
    </div>

    <!-- Legend -->
    <div class="mb-8">
        <h3 class="font-semibold text-lg mb-4">Color Legend (Success Rate)</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="flex items-center space-x-3 p-3 rounded-lg bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800">
                <div class="w-4 h-4 rounded-full bg-green-500"></div>
                <div>
                    <div class="font-medium text-green-800 dark:text-green-200">Excellent</div>
                    <div class="text-sm text-green-600 dark:text-green-400">≥ 80%</div>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 rounded-lg bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-800">
                <div class="w-4 h-4 rounded-full bg-yellow-500"></div>
                <div>
                    <div class="font-medium text-yellow-800 dark:text-yellow-200">Good</div>
                    <div class="text-sm text-yellow-600 dark:text-yellow-400">50-79%</div>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 rounded-lg bg-orange-50 dark:bg-orange-900/30 border border-orange-200 dark:border-orange-800">
                <div class="w-4 h-4 rounded-full bg-orange-500"></div>
                <div>
                    <div class="font-medium text-orange-800 dark:text-orange-200">Fair</div>
                    <div class="text-sm text-orange-600 dark:text-orange-400">25-49%</div>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 rounded-lg bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800">
                <div class="w-4 h-4 rounded-full bg-red-500"></div>
                <div>
                    <div class="font-medium text-red-800 dark:text-red-200">Poor</div>
                    <div class="text-sm text-red-600 dark:text-red-400">&lt; 25%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Notice how rows are colored based on their success rate</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.row-classes-demo-table />
        </div>
    </div>
</div>

