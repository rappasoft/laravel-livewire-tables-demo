<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">EmptyStateTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        // Simple text customization
        ->emptyStateHeading('No Users Found')
        ->emptyStateDescription('Try adjusting your search or filters.');

    // Or use a custom view
    // ->emptyState(view('custom.empty-state'))

    // Pass data to custom view
    // ->emptyState(view('custom.empty-state', ['icon' => 'search']))
}</code></pre>
    </div>

    <!-- Notice -->
    <div class="mb-8 bg-gradient-to-r from-orange-50 to-amber-50 dark:from-orange-900/20 dark:to-amber-900/20 rounded-xl p-6 border border-orange-200 dark:border-orange-800">
        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-orange-900 dark:text-orange-100 mb-1">Demo Pre-loaded</h3>
                <p class="text-orange-800 dark:text-orange-200">
                    This demo is pre-loaded with a search term that matches nothing, so you can see the custom empty state immediately. 
                    Clear the search box to see the actual data.
                </p>
            </div>
        </div>
    </div>

    <!-- Available Methods -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <code class="text-orange-600 dark:text-orange-400 text-sm font-mono">emptyStateHeading(string)</code>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Set the main title for the empty state</p>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <code class="text-orange-600 dark:text-orange-400 text-sm font-mono">emptyStateDescription(string)</code>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Set the description text below the heading</p>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <code class="text-orange-600 dark:text-orange-400 text-sm font-mono">emptyState(View)</code>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Use a completely custom Blade view</p>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
            <code class="text-orange-600 dark:text-orange-400 text-sm font-mono">hideWhenEmpty()</code>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Hide the entire table when empty</p>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo - Custom Empty State</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Notice the custom heading and description. Clear the search to see data.</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.empty-state-demo-table />
        </div>
    </div>
</div>
