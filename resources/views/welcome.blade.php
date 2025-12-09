<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire Tables Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Space Grotesk', sans-serif; }
        .theme-card {
            transition: all 0.3s ease;
        }
        .theme-card:hover {
            transform: translateY(-4px);
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 min-h-screen">
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-4 py-2 bg-indigo-500/20 rounded-full text-indigo-300 text-sm mb-6">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                v4.0.0 - Latest Release
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Livewire Tables
                <span class="gradient-text">Demo</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-8">
                A powerful, feature-rich datatable component for Laravel Livewire. 
                Choose your theme and explore the possibilities.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://github.com/rappasoft/laravel-livewire-tables" target="_blank" 
                   class="inline-flex items-center px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-all">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    GitHub
                </a>
                <a href="https://rappasoft.com/docs/laravel-livewire-tables" target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Documentation
                </a>
            </div>
        </div>

        <!-- Theme Selector -->
        <div class="max-w-4xl mx-auto mb-16">
            <h2 class="text-2xl font-semibold text-white text-center mb-8">Choose Your Theme</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tailwind -->
                <a href="/tw3" class="theme-card block p-6 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 backdrop-blur-sm rounded-xl border border-cyan-500/30 hover:border-cyan-400">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-cyan-500/30 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-cyan-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Tailwind CSS</h3>
                            <p class="text-cyan-300 text-sm">Modern & Flexible</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Clean, utility-first styling with dark mode support and modern design patterns.
                    </p>
                </a>

                <!-- Bootstrap 5 -->
                <a href="/bs5" class="theme-card block p-6 bg-gradient-to-br from-purple-500/20 to-indigo-500/20 backdrop-blur-sm rounded-xl border border-purple-500/30 hover:border-purple-400">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-500/30 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-purple-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.77 11.24H9.956V8.202h2.152c1.17 0 1.834.522 1.834 1.466 0 1.008-.773 1.572-2.174 1.572zm.324 1.206H9.957v3.348h2.231c1.459 0 2.232-.585 2.232-1.685s-.795-1.663-2.326-1.663zM24 11.39v1.218c-1.128.108-1.817.944-2.226 2.268-.407 1.319-.463 2.937-.42 4.186.045 1.3-.968 2.5-2.337 2.5H4.985c-1.37 0-2.383-1.2-2.337-2.5.043-1.249-.013-2.867-.42-4.186-.41-1.324-1.1-2.16-2.228-2.268V11.39c1.128-.108 1.819-.944 2.227-2.268.408-1.319.464-2.937.42-4.186-.045-1.3.968-2.5 2.338-2.5h14.032c1.37 0 2.382 1.2 2.337 2.5-.043 1.249.013 2.867.42 4.186.409 1.324 1.098 2.16 2.226 2.268zm-7.927 2.817c0-1.354-.953-2.333-2.368-2.488v-.057c1.04-.169 1.856-1.135 1.856-2.213 0-1.537-1.213-2.538-3.062-2.538h-4.16v10.172h4.181c2.218 0 3.553-1.086 3.553-2.876z"/>
                            </svg>
                        </div>
<div>
                            <h3 class="text-xl font-semibold text-white">Bootstrap 5</h3>
                            <p class="text-purple-300 text-sm">Popular & Stable</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Industry-standard framework with comprehensive components and excellent browser support.
                    </p>
                </a>

                <!-- Bootstrap 4 -->
                <a href="/bs4" class="theme-card block p-6 bg-gradient-to-br from-orange-500/20 to-red-500/20 backdrop-blur-sm rounded-xl border border-orange-500/30 hover:border-orange-400">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-orange-500/30 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-orange-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.77 11.24H9.956V8.202h2.152c1.17 0 1.834.522 1.834 1.466 0 1.008-.773 1.572-2.174 1.572zm.324 1.206H9.957v3.348h2.231c1.459 0 2.232-.585 2.232-1.685s-.795-1.663-2.326-1.663zM24 11.39v1.218c-1.128.108-1.817.944-2.226 2.268-.407 1.319-.463 2.937-.42 4.186.045 1.3-.968 2.5-2.337 2.5H4.985c-1.37 0-2.383-1.2-2.337-2.5.043-1.249-.013-2.867-.42-4.186-.41-1.324-1.1-2.16-2.228-2.268V11.39c1.128-.108 1.819-.944 2.227-2.268.408-1.319.464-2.937.42-4.186-.045-1.3.968-2.5 2.338-2.5h14.032c1.37 0 2.382 1.2 2.337 2.5-.043 1.249.013 2.867.42 4.186.409 1.324 1.098 2.16 2.226 2.268zm-7.927 2.817c0-1.354-.953-2.333-2.368-2.488v-.057c1.04-.169 1.856-1.135 1.856-2.213 0-1.537-1.213-2.538-3.062-2.538h-4.16v10.172h4.181c2.218 0 3.553-1.086 3.553-2.876z"/>
                            </svg>
                        </div>
    <div>
                            <h3 class="text-xl font-semibold text-white">Bootstrap 4</h3>
                            <p class="text-orange-300 text-sm">Legacy Support</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">
                        For projects still using Bootstrap 4. Full feature parity with newer versions.
                    </p>
                </a>
            </div>
        </div>

        <!-- New Features Banner -->
        <div class="max-w-4xl mx-auto mb-16">
            <a href="/new-features" class="block p-8 bg-gradient-to-r from-purple-600/30 via-pink-600/30 to-orange-600/30 backdrop-blur-sm rounded-2xl border border-purple-500/30 hover:border-purple-400 transition-all group">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center mb-2">
                            <span class="text-3xl mr-3">🚀</span>
                            <h3 class="text-2xl font-bold text-white">New in v4.0</h3>
                        </div>
                        <p class="text-gray-300">
                            Column Summaries, Enhanced Polling, Row Grouping, Deferred Loading, Global Settings & more!
                        </p>
                    </div>
                    <div class="flex items-center text-purple-300 group-hover:text-white transition-colors">
                        <span class="font-semibold mr-2">Explore Features</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        <!-- Quick Stats -->
        <div class="max-w-4xl mx-auto mb-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-6 bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold text-white mb-1">2M+</div>
                    <div class="text-gray-400 text-sm">Downloads</div>
                </div>
                <div class="text-center p-6 bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold text-white mb-1">1.5K+</div>
                    <div class="text-gray-400 text-sm">GitHub Stars</div>
                </div>
                <div class="text-center p-6 bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold text-white mb-1">3</div>
                    <div class="text-gray-400 text-sm">Theme Options</div>
                </div>
                <div class="text-center p-6 bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold text-white mb-1">1571</div>
                    <div class="text-gray-400 text-sm">Tests Passing</div>
                </div>
            </div>
        </div>

        <!-- Features Overview -->
        <div class="max-w-6xl mx-auto mb-16">
            <h2 class="text-2xl font-semibold text-white text-center mb-8">Why Livewire Tables?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">No JavaScript Required</h3>
                    <p class="text-gray-400 text-sm">Fully server-rendered with Livewire. No complex JS build steps needed.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Standalone Package</h3>
                    <p class="text-gray-400 text-sm">Works with any Laravel project. No Filament or admin panel required.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Highly Customizable</h3>
                    <p class="text-gray-400 text-sm">Extensive configuration options for columns, filters, sorting, and styling.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Advanced Filters</h3>
                    <p class="text-gray-400 text-sm">Text, select, multi-select, date, date range, number range, and custom filters.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Bulk Actions</h3>
                    <p class="text-gray-400 text-sm">Select multiple rows and perform batch operations with confirmation dialogs.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Auto Refresh</h3>
                    <p class="text-gray-400 text-sm">Configurable polling intervals with human-readable syntax like poll('30s').</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Comprehensive Relationships</h3>
                    <p class="text-gray-400 text-sm">Display hasMany, belongsToMany, nested relationships with collections, sorting, and searching.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-teal-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Column Summaries</h3>
                    <p class="text-gray-400 text-sm">Calculate sums, averages, counts, min, max in table footers with custom callbacks.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-rose-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Row Grouping</h3>
                    <p class="text-gray-400 text-sm">Group rows by column values with collapsible sections and visual indicators.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Dynamic Row Styling</h3>
                    <p class="text-gray-400 text-sm">Apply custom CSS classes to rows based on data conditions for visual feedback.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Deferred Loading</h3>
                    <p class="text-gray-400 text-sm">Improve initial page load by deferring table data until after page render.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-violet-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Global Settings</h3>
                    <p class="text-gray-400 text-sm">Configure default settings across all tables in your application from one place.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-sky-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Export Data</h3>
                    <p class="text-gray-400 text-sm">Export filtered table data to CSV, Excel, and PDF formats with custom formatters.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-lime-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Smart Search</h3>
                    <p class="text-gray-400 text-sm">Search across multiple columns with exact match options and PostgreSQL ILIKE support.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Column Reordering</h3>
                    <p class="text-gray-400 text-sm">Drag and drop column reordering with persistent state storage for user preferences.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl">
                    <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Custom Empty States</h3>
                    <p class="text-gray-400 text-sm">Define custom views, headings, and descriptions when tables have no data to display.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-500 text-sm">
            <p class="mb-2">Built with ❤️ by <a href="https://rappasoft.com" class="text-indigo-400 hover:underline">Rappasoft</a></p>
            <p>Laravel 10/11/12 • PHP 8.1+ • Livewire 3/4</p>
        </div>
    </div>
</body>
</html>
