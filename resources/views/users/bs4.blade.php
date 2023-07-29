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
    </style>
</head>

<body>

    <div class="px-3 py-3 mx-auto text-center pt-md-5 pb-md-4">
        <img class="mx-auto mb-4 d-block" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" />
        <p class="lead">Bootstrap 4 Implementation - 
            <a href="https://gist.github.com/rappasoft/948adf542307b8f620d53c7c7e735d3c" target="_blank">
                Gist
            </a>
        </p>
        @include('includes.buttons', ['displayStyle' => $displayStyle ])

    </div>

    <div class="container">
         <div>
            <livewire:other-component />
        </div>
        <div>
            <livewire:users-table theme="bootstrap-4" filterLayout="{{ $displayStyle }}"/>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@livewireScriptConfig 
@stack('scripts')

</body>

</html>
