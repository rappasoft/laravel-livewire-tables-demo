<div>
    <!-- Code Example -->
    <div class="mb-8 bg-slate-800 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-4 py-2 bg-slate-700/50">
            <span class="text-slate-400 text-sm font-medium">Example Usage</span>
            <span class="text-xs text-slate-500">PollingTable.php</span>
        </div>
        <pre class="p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->setRefreshTime(10000);   // Refresh every 10 seconds (milliseconds)

    // Other refresh modes (set only ONE of these):
    // ->setRefreshTime(30000)          // 30 seconds
    // ->setRefreshTime(60000)          // 1 minute
    // ->setRefreshVisible()            // only while the tab is visible
    // ->setRefreshKeepAlive()          // keep the session alive
    // ->setRefreshMethod('myMethod')   // call a component method
}</code></pre>
    </div>

    <!-- v3 note -->
    <div class="mb-8 rounded-lg border border-amber-300 bg-amber-50 p-4 text-sm text-amber-900 dark:border-amber-700 dark:bg-amber-900/20 dark:text-amber-200">
        <strong>Note:</strong> in v3 the refresh interval is set with <code>setRefreshTime()</code> in <em>milliseconds</em>.
        Human-readable intervals such as <code>'10s'</code> or <code>'1m'</code> are not available, and only one of
        <code>setRefreshTime()</code>, <code>setRefreshVisible()</code>, <code>setRefreshKeepAlive()</code> or
        <code>setRefreshMethod()</code> can be active at a time &mdash; they all write the same underlying setting.
    </div>

    <!-- Status Indicator -->
    <div class="mb-8 flex items-center justify-center">
        <div class="bg-white dark:bg-slate-800 rounded-full px-6 py-3 shadow-lg border border-slate-200 dark:border-slate-700 flex items-center space-x-3">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <span class="font-medium">Auto-refreshing every 10 seconds</span>
            <span class="text-slate-400 text-sm" x-data="{ time: new Date().toLocaleTimeString() }" x-init="setInterval(() => time = new Date().toLocaleTimeString(), 1000)" x-text="time"></span>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700 text-center">
            <div class="text-2xl font-bold text-green-600 dark:text-green-400 font-mono">10s</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">10 seconds</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700 text-center">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 font-mono">30s</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">30 seconds</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700 text-center">
            <div class="text-2xl font-bold text-purple-600 dark:text-purple-400 font-mono">1m</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">1 minute</div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg p-4 border border-slate-200 dark:border-slate-700 text-center">
            <div class="text-2xl font-bold text-orange-600 dark:text-orange-400 font-mono">5m</div>
            <div class="text-sm text-slate-500 dark:text-slate-400">5 minutes</div>
        </div>
    </div>

    <!-- Live Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-semibold text-lg">Live Demo</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Watch the "Last Updated" column change automatically</p>
        </div>
        <div class="p-4">
            <livewire:demos.tables.polling-demo-table />
        </div>
    </div>
</div>

