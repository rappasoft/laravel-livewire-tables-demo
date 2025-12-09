<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">DeferredLoadingTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->deferLoading();  // Enable deferred/lazy loading

    // The table will show a loading placeholder
    // while the data is being fetched asynchronously.
    
    // Great for:
    // - Tables with complex queries
    // - Tables with many joins
    // - Heavy data processing
    // - Improving perceived performance
}</code></pre>
    </div>

    <!-- How it Works -->
    <div class="mb-8 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
        <h3 class="font-semibold text-lg text-blue-900 dark:text-blue-100 mb-4">How It Works</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">1</div>
                <div>
                    <div class="font-medium text-blue-900 dark:text-blue-100">Page Loads</div>
                    <div class="text-sm text-blue-700 dark:text-blue-300">HTML renders immediately with a loading placeholder</div>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">2</div>
                <div>
                    <div class="font-medium text-blue-900 dark:text-blue-100">Async Fetch</div>
                    <div class="text-sm text-blue-700 dark:text-blue-300">Livewire fetches table data in the background</div>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">3</div>
                <div>
                    <div class="font-medium text-blue-900 dark:text-blue-100">Data Displays</div>
                    <div class="text-sm text-blue-700 dark:text-blue-300">Table content replaces the placeholder smoothly</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Refresh the page to see the loading placeholder before data appears</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.deferred-demo-table />
        </div>
    </div>
</div>

