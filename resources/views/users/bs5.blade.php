@props(['displayStyle' => 'popover'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bootstrap 5 Livewire Tables</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <style>
        [x-cloak] {
            display: none !important;
        }

        .bg-gray {
            background-color: grey;
        }

        .bg-white {
            background-color: white;
        }
    </style>
    @vite(['resources/js/app.js'])

</head>

<body>
    <div>
        <div class="px-4 my-5 text-center">
            <img class="mx-auto mb-4 d-block" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57" />
                <p class="lead">
                    Bootstrap 5 Implementation - 
                    <a href="https://gist.github.com/rappasoft/948adf542307b8f620d53c7c7e735d3c" target="_blank">
                        Gist
                    </a>
                </p>
                @include('includes.buttons', ['displayStyle' => $displayStyle ])
        </div>

        <div class="container">
        <div wire:key="otherComponent">
            <livewire:other-component />
        </div>
        <div wire:key="newsTable">
            <livewire:users-table theme="bootstrap-5" filterLayout="{{ $displayStyle }}"/>

        </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        @stack('scripts')
        @livewireScriptConfig 

    </div>

</body>

</html>
