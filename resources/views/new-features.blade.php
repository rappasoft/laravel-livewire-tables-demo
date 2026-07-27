<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - Laravel Livewire Tables v3</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                Laravel Livewire Tables v3
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Features
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto">
                A dynamic, responsive datatable component for Laravel and Livewire 3 &mdash; searching, sorting,
                filtering, bulk actions, and more. Every snippet below is real v3 API, and each card links to a live demo.
            </p>
        </div>

        <!-- Feature Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto mb-16">

            <!-- Column Footers -->
            <a href="/summaries" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-sm rounded-2xl border border-purple-500/20 hover:border-purple-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-purple-300 transition-colors">Column Footers</h2>
                    <p class="text-slate-400 mb-4">
                        Add a footer row with computed values &mdash; averages, totals, counts &mdash; per column via a callback over the visible rows.
                    </p>
                    <code class="text-sm text-purple-400 bg-purple-500/10 px-2 py-1 rounded">->footer(fn($rows) => ...)</code>
                </div>
            </a>

            <!-- Auto Refresh -->
            <a href="/polling" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-sm rounded-2xl border border-green-500/20 hover:border-green-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-green-300 transition-colors">Auto Refresh</h2>
                    <p class="text-slate-400 mb-4">
                        Refresh the table on an interval in milliseconds. Combine with setRefreshVisible() or setRefreshKeepAlive() to control when polling runs.
                    </p>
                    <code class="text-sm text-green-400 bg-green-500/10 px-2 py-1 rounded">->setRefreshTime(10000)</code>
                </div>
            </a>

            <!-- Loading Placeholder -->
            <a href="/deferred" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-sm rounded-2xl border border-blue-500/20 hover:border-blue-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors">Loading Placeholder</h2>
                    <p class="text-slate-400 mb-4">
                        Show a placeholder row while the table fetches data. Customize the text with setLoadingPlaceholderContent().
                    </p>
                    <code class="text-sm text-blue-400 bg-blue-500/10 px-2 py-1 rounded">->setLoadingPlaceholderEnabled()</code>
                </div>
            </a>

            <!-- Default Sorting -->
            <a href="/grouping" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-yellow-500/10 to-orange-500/10 backdrop-blur-sm rounded-2xl border border-yellow-500/20 hover:border-yellow-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-yellow-300 transition-colors">Sorting &amp; Defaults</h2>
                    <p class="text-slate-400 mb-4">
                        Make any column sortable and keep related records together with a default sort applied before user interaction.
                    </p>
                    <code class="text-sm text-yellow-400 bg-yellow-500/10 px-2 py-1 rounded">->setDefaultSort('active', 'desc')</code>
                </div>
            </a>

            <!-- Row & Cell Styling -->
            <a href="/row-classes" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-pink-500/10 to-rose-500/10 backdrop-blur-sm rounded-2xl border border-pink-500/20 hover:border-pink-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg shadow-pink-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-pink-300 transition-colors">Row &amp; Cell Styling</h2>
                    <p class="text-slate-400 mb-4">
                        Apply conditional classes and attributes to rows and cells based on record data, with setTdAttributes() for individual cells.
                    </p>
                    <code class="text-sm text-pink-400 bg-pink-500/10 px-2 py-1 rounded">->setTrAttributes(fn($row) => ...)</code>
                </div>
            </a>

            <!-- Custom Empty Message -->
            <a href="/empty-state" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-orange-500/10 to-amber-500/10 backdrop-blur-sm rounded-2xl border border-orange-500/20 hover:border-orange-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-orange-300 transition-colors">Custom Empty Message</h2>
                    <p class="text-slate-400 mb-4">
                        Customize the message shown when the table has no records, or hide the table entirely with setShouldBeHidden().
                    </p>
                    <code class="text-sm text-orange-400 bg-orange-500/10 px-2 py-1 rounded">->setEmptyMessage('No results')</code>
                </div>
            </a>

            <!-- Aggregate Columns -->
            <a href="/relationships" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-cyan-500/10 to-teal-500/10 backdrop-blur-sm rounded-2xl border border-cyan-500/20 hover:border-cyan-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors">Aggregate Columns</h2>
                    <p class="text-slate-400 mb-4">
                        Display relationship aggregates with CountColumn, SumColumn, and AvgColumn &mdash; sortable out of the box.
                    </p>
                    <code class="text-sm text-cyan-400 bg-cyan-500/10 px-2 py-1 rounded">CountColumn::make('Posts')->setDataSource('posts')</code>
                </div>
            </a>

            <!-- ArrayColumn -->
            <a href="/relationship-types" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-sm rounded-2xl border border-purple-500/20 hover:border-purple-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-purple-300 transition-colors">ArrayColumn</h2>
                    <p class="text-slate-400 mb-4">
                        Render many related records inside a single cell, with a custom separator, wrappers, and per-item output format.
                    </p>
                    <code class="text-sm text-purple-400 bg-purple-500/10 px-2 py-1 rounded">ArrayColumn::make('Tags')->data(fn($v, $row) => ...)</code>
                </div>
            </a>

            <!-- Full Showcase -->
            <a href="/tailwind" class="feature-card group">
                <div class="h-full p-6 bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-sm rounded-2xl border border-green-500/20 hover:border-green-400/50">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/25">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2 group-hover:text-green-300 transition-colors">Filters, Bulk Actions &amp; More</h2>
                    <p class="text-slate-400 mb-4">
                        The full showcase: a dozen filter types, bulk actions with confirmation, column selection, and reordering in one table.
                    </p>
                    <code class="text-sm text-green-400 bg-green-500/10 px-2 py-1 rounded">->setBulkActions(['export' => 'Export'])</code>
                </div>
            </a>

        </div>

        <!-- Component Configuration Section -->
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
                        <h3 class="text-xl font-bold text-white">Component Configuration</h3>
                        <p class="text-slate-400">Every table extends DataTableComponent and is configured in one place</p>
                    </div>
                </div>
                <pre class="bg-slate-800/50 rounded-xl p-4 text-sm text-slate-300 overflow-x-auto"><code>public function configure(): void
{
    $this->setPrimaryKey('id')
        ->setPerPageAccepted([10, 25, 50, 100])
        ->setSearchDebounce(500)
        ->setLoadingPlaceholderEnabled()
        ->setEmptyMessage('No results found');
}</code></pre>
            </div>
        </div>

        <!-- More v3 Features -->
        <div class="max-w-4xl mx-auto mb-16">
            <div class="p-8 bg-gradient-to-br from-slate-700/30 to-slate-800/30 backdrop-blur-sm rounded-2xl border border-slate-600/30">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl flex items-center justify-center shadow-lg shadow-slate-500/25 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">More v3 Features</h3>
                        <p class="text-slate-400">Everything the package ships with today</p>
                    </div>
                </div>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">A Dozen Filter Types</strong> &mdash; Text, Select, MultiSelect, MultiSelectDropdown, Number, NumberRange, Date, DateTime, DateRange, Boolean, and custom Livewire component filters</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Search Modifiers</strong> &mdash; Tune search behavior with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setSearchDefer()</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setSearchLazy()</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setSearchBlur()</code>, <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setSearchThrottle(500)</code>, or <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setSearchDebounce(500)</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Drag-and-Drop Reordering</strong> &mdash; Let users reorder rows with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setReorderEnabled()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Bulk Actions</strong> &mdash; Select rows and run actions on them, with per-action confirmation via <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setBulkActionConfirms([...])</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Column Selection</strong> &mdash; Users choose visible columns, remembered per user with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setRememberColumnSelectionEnabled()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Secondary Header &amp; Footer Rows</strong> &mdash; Per-column <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->secondaryHeader()</code> and <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->footer()</code> callbacks, or reuse the header as a footer with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setUseHeaderAsFooterEnabled()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Responsive Column Collapse</strong> &mdash; Tuck columns behind an expandable row with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->collapseOnMobile()</code> or <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->collapseAlways()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Filter Pills &amp; Layouts</strong> &mdash; Show applied filters as pills, and switch between slide-down and popover layouts with <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setFilterLayoutSlideDown()</code> or <code class="text-purple-400 bg-purple-500/10 px-1 rounded">->setFilterLayoutPopover()</code></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">18 Column Types</strong> &mdash; Boolean, Date, Image, Icon, Color, Link, WireLink, ButtonGroup, Component, LivewireComponent, ViewComponent, Increment, Array, and aggregate columns</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><strong class="text-white">Livewire 3 Support</strong> &mdash; Built for Livewire 3.x on Laravel 10 and above, with Tailwind and Bootstrap themes</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-slate-500 text-sm">
            <p class="mb-2">Built with ❤️ by <a href="https://rappasoft.com" class="text-indigo-400 hover:underline">Rappasoft</a></p>
            <p>Laravel 10/11/12 • PHP 8.1+ • Livewire 3</p>
        </div>
    </div>
</body>
</html>
