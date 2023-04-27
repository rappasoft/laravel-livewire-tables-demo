<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bootstrap 5 Livewire Tables</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="{{ mix('js/app.js') }}" defer></script>

    <livewire:styles />
    @stack('styles')

    <style>
        .bg-gray {
            background-color: grey;
        }

        .bg-white {
            background-color: white;
        }
    </style>


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body>
@include('includes.buttons', ['displayStyle' => 'slide-down'])

    <div class="px-4 my-5 text-center">
    <img class="mx-auto mb-4 d-block" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <p class="lead">Bootstrap 5 Implementation - <a
                href="https://gist.github.com/rappasoft/948adf542307b8f620d53c7c7e735d3c" target="_blank">Gist</a></p>
    </div>

    <div class="container">
        <livewire:users-table theme="bootstrap-5" filterLayout="slide-down" />
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <livewire:scripts />

    @stack('scripts')

</body>

</html>
