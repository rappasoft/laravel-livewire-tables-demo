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

    </head>
    <body class="dark:bg-gray-900 dark:text-white">

        <div class="pb-6 mx-auto space-y-10 w-full px-8">
            <div>
                <livewire:users-table myParam="Test" filterLayout="{{ $displayStyle }}"/>
            </div>
        </div>

        @livewireScriptConfig 

    </body>
</html>
