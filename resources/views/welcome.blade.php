<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Livewire Tables</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Livewire Tables Demo</h1>

        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('bs4') }}" class="btn btn-primary btn-lg px-4 gap-3">Bootstrap 4</a>
                <a href="{{ route('bs5') }}" class="btn btn-primary btn-lg px-4 gap-3">Bootstrap 5</a>
                <a href="{{ route('tw') }}" class="btn btn-primary btn-lg px-4 gap-3">Tailwind 2</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
