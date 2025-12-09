<div class="mb-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl shadow-lg mb-6 overflow-hidden">
        <div class="px-6 py-6 text-center">
            <h1 class="text-2xl md:text-3xl font-bold mb-3">Laravel Livewire Tables</h1>
            
            <!-- Theme Switcher -->
            <div class="flex flex-wrap items-center justify-center gap-2">
                <a href="/tw3" class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->is('tw3') ? 'bg-white text-indigo-600' : 'bg-white/20 hover:bg-white/30 text-white' }}">
                    Tailwind 3
                </a>
                <a href="/tw2" class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->is('tw2') ? 'bg-white text-indigo-600' : 'bg-white/20 hover:bg-white/30 text-white' }}">
                    Tailwind 2
                </a>
                <a href="/bs5" class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->is('bs5') ? 'bg-white text-indigo-600' : 'bg-white/20 hover:bg-white/30 text-white' }}">
                    Bootstrap 5
                </a>
                <a href="/bs4" class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->is('bs4') ? 'bg-white text-indigo-600' : 'bg-white/20 hover:bg-white/30 text-white' }}">
                    Bootstrap 4
                </a>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-wrap items-center justify-center gap-4 mt-4 pt-4 border-t border-white/20">
                <a href="/" class="text-sm text-indigo-200 hover:text-white transition-colors">← Home</a>
                <a href="/new-features" class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-pink-500 to-orange-500 rounded-lg text-sm font-medium hover:from-pink-600 hover:to-orange-600 transition-all">
                    🚀 New Features
                </a>
                <a href="https://rappasoft.com/docs/laravel-livewire-tables" target="_blank" class="text-sm text-indigo-200 hover:text-white transition-colors">Docs →</a>
            </div>
        </div>
    </div>

    <!-- Controls Bar -->
    <div class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-gray-800 dark:to-gray-900 rounded-xl border border-slate-200 dark:border-gray-700 p-4 shadow-sm">
        <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3">
            <div class="flex items-center gap-2">
                <label class="text-xs font-semibold text-slate-500 dark:text-gray-400 uppercase tracking-wide">Table</label>
                @include('includes.sections.header.controls.tableSwitcher')
            </div>
            
            <div class="hidden md:block h-8 w-px bg-slate-300 dark:bg-gray-600"></div>
            
            <div class="flex items-center gap-2">
                <label class="text-xs font-semibold text-slate-500 dark:text-gray-400 uppercase tracking-wide">Filters</label>
                @include('includes.sections.header.controls.filterSwitcher')
            </div>
            
            <div class="hidden md:block h-8 w-px bg-slate-300 dark:bg-gray-600"></div>
            
            <div class="flex items-center gap-2">
                <label class="text-xs font-semibold text-slate-500 dark:text-gray-400 uppercase tracking-wide">View</label>
                @include('includes.sections.header.controls.themeSwitcher')
            </div>
            
            <div class="hidden md:block h-8 w-px bg-slate-300 dark:bg-gray-600"></div>
            
            <div class="flex items-center gap-2">
                <label class="text-xs font-semibold text-slate-500 dark:text-gray-400 uppercase tracking-wide">Locale</label>
                @include('includes.sections.header.controls.localeSwitcher')
            </div>
        </div>
    </div>
</div>
