<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Tables Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 antialiased dark:bg-slate-900">
    <div class="container mx-auto px-4 py-8">
        <h1 class="mb-8 text-3xl font-bold text-slate-900 dark:text-white">Livewire Tables Demo - Tailwind 4</h1>

        <div class="rounded-lg bg-white p-6 shadow-lg dark:bg-slate-800">
            @livewire('users-table')
        </div>
    </div>

    @livewireScripts
</body>
</html>
