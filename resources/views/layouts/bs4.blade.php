@props(['displayStyle' => 'popover'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bootstrap 4 Livewire Tables</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    @vite(['resources/js/app.js'])
    @stack('styles')


    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Force light mode styles - override any Tailwind dark mode classes */
        html, body {
            background-color: #f8f9fa !important;
            color: #212529 !important;
        }

        /* Override Tailwind text-white except in gradient headers */
        body > * > * > div:not(.bg-gradient-to-r) .text-white,
        body .text-white:not(.bg-gradient-to-r):not(.bg-gradient-to-r *) {
            color: #212529 !important;
        }

        /* Ensure form controls are visible */
        select, input, textarea, button {
            background-color: white !important;
            color: #212529 !important;
            border-color: #dee2e6 !important;
        }

        /* Override any dark background classes except gradients */
        .dark\:bg-gray-800:not(.bg-gradient-to-r),
        .dark\:bg-gray-900:not(.bg-gradient-to-r),
        .dark\:from-gray-800:not(.bg-gradient-to-r),
        .dark\:to-gray-900:not(.bg-gradient-to-r) {
            background-color: white !important;
        }

        /* Override dark text colors */
        .dark\:text-gray-200,
        .dark\:text-gray-300,
        .dark\:text-gray-400 {
            color: #212529 !important;
        }
    </style>
    <script>
        // Force light mode for Bootstrap demos - prevent dark mode from being applied
        localStorage.setItem('dark', 'false');

        // Remove dark class immediately
        if (document.documentElement) {
            document.documentElement.classList.remove('dark');
        }

        // Also remove after DOM loads
        document.addEventListener('DOMContentLoaded', function() {
            document.documentElement.classList.remove('dark');
            document.body.classList.remove('dark');
        });

        // Watch for any attempts to add the dark class and remove it
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                    }
                    if (document.body.classList.contains('dark')) {
                        document.body.classList.remove('dark');
                    }
                }
            });
        });

        // Start observing
        if (document.documentElement) {
            observer.observe(document.documentElement, { attributes: true });
        }
        document.addEventListener('DOMContentLoaded', function() {
            observer.observe(document.body, { attributes: true });
        });
    </script>
</head>

<body>

    <div class="px-3 py-3 mx-auto text-center pt-md-5 pb-md-4">
        <img class="mx-auto mb-4 d-block" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" />
        <p class="lead">Bootstrap 4 Implementation - 
            <a href="https://gist.github.com/rappasoft/948adf542307b8f620d53c7c7e735d3c" target="_blank">
                Gist
            </a>
        </p>

    </div>

    <div class="container w-100">
         <div>
            <livewire:other-component />
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@livewireScriptConfig 
@stack('scripts')

</body>

</html>
