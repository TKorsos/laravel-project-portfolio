<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Alapértelmezett cím ha nincs neki egyedi'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- google font end -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Ide jöhetnek a stíluslapok, script elemek -->
    @yield('head')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" id="navigationContainer">
            <div class="container-fluid justify-content-between px-2 px-md-3 px-lg-4 px-xl-5">
                <a id="logo" class="navbar-brand d-flex justify-content-center align-items-center">
                    <img src="{{ asset( $globalSettings->website_logo_url ) }}" alt="logó">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-evenly" id="menuContainer">
                        @foreach ($menuItems as $item)
                            <li class="nav-item">
                                <a 
                                class="nav-link {{ request()->routeIs($item->route) ? 'active' : '' }}" 
                                href="{{ route($item->route) }}" 
                                aria-current="{{ request()->routeIs($item->route) ? 'page' : '' }}"
                                >
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
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
        &copy; @if (false) {{ $globalSettings->website_launch_date.' - ' }} @endif {{date('Y')}} {{config('app.name', 'Laravel')}}. {{$globalSettings->admin_email}}. Minden jog fenntartva.
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
