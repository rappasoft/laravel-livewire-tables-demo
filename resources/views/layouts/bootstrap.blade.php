<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap {{ $version }} Livewire Tables</title>
    @if ($version === '4')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @endif
    <style>[x-cloak] { display: none !important; }</style>
    @stack('styles')
</head>
<body class="bg-light">
    <header class="bg-primary text-white p-4 mb-4">
        <h1 class="h3">Bootstrap {{ $version }} Livewire Tables Demo</h1>
        <p>Laravel Livewire Tables v3 · Livewire {{ \Composer\InstalledVersions::getPrettyVersion('livewire/livewire') }}</p>
        <nav aria-label="Demo navigation" class="d-flex flex-wrap" style="gap: 1rem">
            <a href="/" class="text-white">Home</a>
            <a href="/tailwind" class="text-white">Tailwind 4</a>
            <a href="/bootstrap-4" class="text-white">Bootstrap 4</a>
            <a href="/bootstrap-5" class="text-white">Bootstrap 5</a>
            <a href="/new-features" class="text-white">Feature Showcase</a>
            <a href="https://rappasoft.com/docs/laravel-livewire-tables" class="text-white">Documentation</a>
        </nav>
    </header>
    <main class="container-fluid pb-4">{{ $slot }}</main>
    @if ($version === '4')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    @else
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @endif
    @livewireScripts
    @stack('scripts')
</body>
</html>
