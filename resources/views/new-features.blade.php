<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Features - Laravel Livewire Tables v4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .feature-card:hover {
            transform: translateY(-8px);
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-slate-900 min-h-screen">
    <!-- Background Pattern -->
    <div class="fixed inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-900/20 via-slate-900 to-slate-900 -z-10"></div>
    
    <div class="container mx-auto px-4 py-12">
        <!-- Header -->
        <div class="text-center mb-16">
            <a href="/" class="inline-flex items-center text-slate-400 hover:text-white mb-6 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Home
            </a>
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full text-purple-300 text-sm mb-6 ml-4">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2 animate-pulse"></span>
                Version 4.0
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                New Features
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto">
                Powerful new capabilities inspired by Filament Tables, with the flexibility of a standalone package.
            </p>
        </div>

        <!-- Feature Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto mb-16">
            
            <!-- Summaries -->
            <a href="/summaries" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-sm rounded-2xl border border-purple-500/20 hover:border-purple-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-purple-300 transition-colors">Column Summaries</h2>
                    <p class="text-slate-400 mb-4">
                        Display aggregate values like sum, average, count, min, and max at the bottom of columns.
                    </p>
                    <code class="text-sm text-purple-400 bg-purple-500/10 px-2 py-1 rounded">->summary('avg')</code>
                </div>
            </a>

            <!-- Polling -->
            <a href="/polling" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-sm rounded-2xl border border-green-500/20 hover:border-green-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-green-300 transition-colors">Enhanced Polling</h2>
                    <p class="text-slate-400 mb-4">
                        Auto-refresh tables with human-readable intervals like '10s', '1m', or '5m'.
                    </p>
                    <code class="text-sm text-green-400 bg-green-500/10 px-2 py-1 rounded">->poll('10s')</code>
                </div>
            </a>

            <!-- Deferred Loading -->
            <a href="/deferred" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-sm rounded-2xl border border-blue-500/20 hover:border-blue-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors">Deferred Loading</h2>
                    <p class="text-slate-400 mb-4">
                        Improve initial page load times by fetching table data asynchronously.
                    </p>
                    <code class="text-sm text-blue-400 bg-blue-500/10 px-2 py-1 rounded">->deferLoading()</code>
                </div>
            </a>

            <!-- Row Grouping -->
            <a href="/grouping" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-yellow-500/10 to-orange-500/10 backdrop-blur-sm rounded-2xl border border-yellow-500/20 hover:border-yellow-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-yellow-300 transition-colors">Row Grouping</h2>
                    <p class="text-slate-400 mb-4">
                        Group table rows by column values with collapsible sections.
                    </p>
                    <code class="text-sm text-yellow-400 bg-yellow-500/10 px-2 py-1 rounded">->groupBy('status')</code>
                </div>
            </a>

            <!-- Dynamic Row Styling -->
            <a href="/row-classes" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-pink-500/10 to-rose-500/10 backdrop-blur-sm rounded-2xl border border-pink-500/20 hover:border-pink-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg shadow-pink-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-pink-300 transition-colors">Dynamic Row Styling</h2>
                    <p class="text-slate-400 mb-4">
                        Apply conditional CSS classes to rows based on record data.
                    </p>
                    <code class="text-sm text-pink-400 bg-pink-500/10 px-2 py-1 rounded">->recordClasses(fn($row) => ...)</code>
                </div>
            </a>

            <!-- Custom Empty State -->
            <a href="/empty-state" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-orange-500/10 to-amber-500/10 backdrop-blur-sm rounded-2xl border border-orange-500/20 hover:border-orange-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-orange-300 transition-colors">Custom Empty State</h2>
                    <p class="text-slate-400 mb-4">
                        Customize the message shown when tables have no records.
                    </p>
                    <code class="text-sm text-orange-400 bg-orange-500/10 px-2 py-1 rounded">->emptyStateHeading('...')</code>
                </div>
            </a>

            <!-- Relationship Aggregates -->
            <a href="/relationships" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-cyan-500/10 to-teal-500/10 backdrop-blur-sm rounded-2xl border border-cyan-500/20 hover:border-cyan-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors">Relationship Aggregates</h2>
                    <p class="text-slate-400 mb-4">
                        Display counts, sums, averages from related models directly in columns.
                    </p>
                    <code class="text-sm text-cyan-400 bg-cyan-500/10 px-2 py-1 rounded">->counts('posts')</code>
                </div>
            </a>

        </div>

        <!-- Global Settings Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <div class="p-8 bg-gradient-to-br from-cyan-500/10 to-blue-500/10 backdrop-blur-sm rounded-2xl border border-cyan-500/20">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/25 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Global Settings</h3>
                        <p class="text-slate-400">Configure defaults for all tables in your application</p>
                    </div>
                </div>
                <pre class="bg-slate-800/50 rounded-xl p-4 text-sm text-slate-300 overflow-x-auto"><code>// In AppServiceProvider::boot()
use Rappasoft\LaravelLivewireTables\DataTableComponent;

DataTableComponent::configureUsing(function ($component) {
    $component->setPerPageAccepted([10, 25, 50, 100]);
    $component->setLoadingPlaceholderEnabled();
    $component->setSearchDebounce(500);
});</code></pre>
            </div>
        </div>

        <!-- Other Fixes & Additions -->
        <div class="max-w-4xl mx-auto mb-16">
            <div class="p-8 bg-gradient-to-br from-slate-700/30 to-slate-800/30 backdrop-blur-sm rounded-2xl border border-slate-600/30">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl flex items-center justify-center shadow-lg shadow-slate-500/25 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Other Fixes & Additions</h3>
                        <p class="text-slate-400">Additional improvements included in v4.0</p>
                    </div>
                </div>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Table Header & Description</strong> — Add headings and descriptions to your tables with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->heading()</code> and <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->description()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">PHP 8.1+ Enums</strong> — Type-safe enums for <code class="text-purple-400 bg-purple-500/10 px-1 rounded">SortDirection</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">FilterLayout</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">PaginationMethod</code>, and more</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">PostgreSQL ILIKE</strong> — Automatic case-insensitive search for PostgreSQL databases</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Exact Match Searching</strong> — Privacy-sensitive columns can use exact matches with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->exactSearchable()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Disable Bulk Actions Per Row</strong> — Conditionally disable checkboxes with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setBulkActionRowDisabled(fn($row) => ...)</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Dynamic Checkbox Attributes</strong> — Per-row attributes for accessibility with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setBulkActionsTdCheckboxAttributes()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Hide Table When Empty</strong> — Clean up the UI with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->hideWhenEmpty()</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setHideTableWhenEmpty()</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setHideToolbarWhenEmpty()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Livewire v4 Support</strong> — Full compatibility with Livewire 4 alongside Livewire 3</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Filter Button Styling</strong> — Customize filter button appearance with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setFilterButtonAttributes()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Improved Localization</strong> — All 22 locale files updated with missing translation keys</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-slate-500 text-sm">
            <p class="mb-2">Built with ❤️ by <a href="https://rappasoft.com" class="text-indigo-400 hover:underline">Rappasoft</a></p>
            <p>Laravel 10/11/12 • PHP 8.1+ • Livewire 3/4</p>
        </div>
    </div>
</body>
</html>
