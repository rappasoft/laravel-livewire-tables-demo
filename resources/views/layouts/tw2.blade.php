@props(['displayStyle' => 'popover'])
<!DOCTYPE html>
<html lang="en" 
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind 2 Tables</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('styles')
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 dark:text-white min-h-screen">
    <!-- Dark Mode Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button x-cloak x-on:click="darkMode = !darkMode;" class="p-2 rounded-lg bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <svg x-show="!darkMode" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
        </button>
    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700 text-white py-6 mb-6 shadow-lg">
        <div class="mx-auto px-4 md:px-8 flex justify-between items-center flex-wrap gap-4">
            <div>
                <h2 class="text-2xl font-bold mb-1">Tailwind 2 Demo</h2>
                <p class="text-indigo-100 text-sm">Laravel Livewire Tables v4.0</p>
            </div>
            <div class="flex gap-2">
                <a href="/" class="px-4 py-2 bg-white/90 hover:bg-white text-indigo-600 rounded-lg transition-colors font-medium text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </a>
                <a href="/new-features" class="px-4 py-2 border border-white/30 hover:bg-white/10 rounded-lg transition-colors font-medium text-sm">
                    New Features
                </a>
            </div>
        </div>
    </div>

    <div class="pb-6 mx-auto space-y-6 w-full px-4 md:px-8">
        <div>
            <livewire:other-component />
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>

    @livewireScriptConfig 
    @stack('scripts')
</body>
</html>
