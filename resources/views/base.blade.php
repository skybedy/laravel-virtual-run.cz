<!DOCTYPE html>
<html lang="cs-CZ">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="" />
        <meta name="description" content="" />
        <title>@yield('title')</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Virtual-Run</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="nahrani-behu">Nahrání běhu</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    
    @stack('scripts')
    </body>
</html>
