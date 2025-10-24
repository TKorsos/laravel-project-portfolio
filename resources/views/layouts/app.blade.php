<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Alapértelmezett cím ha nincs neki egyedi'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Ide jöhetnek a stíluslapok, script elemek -->
    @yield('head')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a id="logo" class="navbar-brand d-flex justify-content-center align-items-center">
                    {{-- fs-1 nézet függő kisebb nézeten fs-3 vagy fs-4 --}}
                    <i class="bi bi-bootstrap-fill d-inline-block fs-1"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    {{-- aria-current="page" és active osztály --}}
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('portfolio')}}">Portfólió</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">Rólam</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Kapcsolat</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </header>

    {{-- errors success globális üzenetek? --}}

    <main class="container-fluid">
        @yield('content')
    </main>

    <footer class="container-fluid py-5 text-center">
        {{-- ide jön minden ami footer mintha include lenne --}}
        {{-- globalSettings launch_date, app.name, admin_email --}}
        &copy; {{date('Y')}} {{config('app.name', 'Laravel')}}. tunde.varkuti@gmail.com. Minden jog fenntartva.
    </footer>

    <!-- Go to Top -->
    <button id="scrollTopBtn" class="btn btn-dark">
        <i class="bi bi-arrow-up"></i>
    </button>
    <!-- End Go to Top -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Oldalspecifikus Javascript -->
    @yield('scripts')
</body>
</html>
