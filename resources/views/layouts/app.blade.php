<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @if (Route::currentRouteName() === 'home')
            {{ $globalSettings->main_title }}
        @else
            @yield('title') - {{ $globalSettings->main_title }}
        @endif
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- google font end -->

    <!-- fontawesome flag -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
    <!-- fontawesome flag end -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- Ide jöhetnek a stíluslapok, script elemek -->
    @yield('head')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" id="navigationContainer">
            <div class="container-fluid justify-content-between px-2 px-md-3 px-lg-4 px-xl-5">
                <!-- Logó és hamburgermenü -->
                <a class="navbar-brand d-flex justify-content-center align-items-center logo">
                    <img src="{{ asset( $globalSettings->website_logo_url ) }}" alt="logó">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{__("toggle_navigation")}}">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Menü -->
                    <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-evenly" id="menuContainer">
                        @foreach ($menuItems as $item)
                            <li class="nav-item">
                                <a 
                                class="nav-link {{ request()->routeIs($item->route) ? 'active' : '' }}" 
                                href="{{ route($item->route) }}" 
                                aria-current="{{ request()->routeIs($item->route) ? 'page' : '' }}"
                                >
                                    {{ __($item->title) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Kereső -->
                    @if(false)
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="{{__("search")}}" aria-label="{{__("search")}}"/>
                        <button id="nav-search" class="btn-outline-orange" type="submit">{{__("search")}}</button>
                    </form>
                    @endif

                    <!-- Nyelvválasztó -->
                    <div class="d-flex align-items-center">
                        @php
                            $langArr = [
                                    "hu" => ["abbr" => "hu", "title" => "lang_hu", "icon" => "hu"],
                                    "en" => ["abbr" => "en", "title" => "lang_en", "icon" => "gb"],
                                ];
                        @endphp

                        @foreach ($langArr as $lang)
                            <a href="{{ route('set-locale', ['lang' => $lang["abbr"]]) }}" title="{{__($lang["title"])}}" class="mx-1 flag {{ app()->getLocale() === $lang["abbr"] ? "active" : "" }}">
                                <i class="fi fi-{{ $lang["icon"] }}" aria-hidden="true"></i>
                                <span class="visually-hidden">{{ __($lang['title']) }}</span>
                            </a>
                        @endforeach

                        {{--
                        <a href="{{ route('set-locale', ['lang' => 'hu']) }}" title="{{__("hungarian")}}" class="mx-1 flag {{ app()->getLocale() === "hu" ? "active" : "" }}">
                            <i class="fi fi-hu"></i>
                        </a>
                        <a href="{{ route('set-locale', ['lang' => 'en']) }}" title="{{__("english")}}" class="mx-1 flag {{ app()->getLocale() === "en" ? "active" : "" }}">
                            <i class="fi fi-gb"></i>
                        </a>
                        --}}

                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- errors success globális üzenetek? de csak ha minden oldalra kell máskülönben elég ott ahol szükséges!! --}}

    <main class="container-fluid">
        @yield('content')
    </main>

    {{-- dark, light, colorful --}}
    <footer id="footer-colorful" class="container-fluid  pb-3 px-0">
        <!-- 1. sor: random portfólió képek -->
        {{--
            itt még ki kell számolni mennyi fér el ideálisan és több nézeten is annyi jelenjen meg random
            hoverre egy átlátszó hátterű réteg amin egy szöveg talán a portfólióhoz tartozó név?
        --}}
        <div class="row g-0">
            {{-- project-item itt is használható nem sak a toplistánál minden hasonló elemre --}}
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=1" alt="Projekt 1" class="img-fluid"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=2" alt="Projekt 2" class="img-fluid"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=3" alt="Projekt 3" class="img-fluid"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=4" alt="Projekt 4" class="img-fluid"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=5" alt="Projekt 5" class="img-fluid"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#"><img src="https://picsum.photos/640/480?random=6" alt="Projekt 6" class="img-fluid"></a>
            </div>
        </div>

        @if ($globalSettings->display_subscribe === '1')
        <!-- 2. sor: hírlevél feliratkozás -->
        <div class="row row-cols-1 row-cols-md-2 mt-5 px-2 px-md-3 px-lg-4 px-xl-5">
            <div class="col text-center d-flex align-items-center justify-content-center mb-2 mb-md-0">
                <h5 class="mb-0">{{__("newsletter_subscribe")}}</h5>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <form action="#" method="POST" class="d-flex align-items-center justify-content-center w-100">
                    @csrf
                    <div class="form-floating d-flex w-100">
                        <input type="email" name="email" class="form-control" id="floating-email" placeholder="Email címed">
                        <label for="floating-email">{{__("email_address")}}</label>
                        <button type="submit" id="subscribe-btn" class="btn btn-dark">{{__("subscribe")}}</button>
                    </div>
                    {{-- hibaüzenet helye --}}
                </form>
            </div>
        </div>
        @endif

        <!-- 3. sor: szlogen + menü + social + top 5 portfólió -->
        <div class="row my-5 px-2 px-md-3 px-lg-4 px-xl-5 text-center text-md-start">
            <!-- Szlogen -->
            <div class="col-md-3">
                <img src="{{ asset($globalSettings->website_logo_url) }}" class="logo mb-2" alt="logó">
                {{-- text-muted ha nem lesz túl sötét a háttér --}}
                <p class="small fst-italic opacity-75">"{{$globalSettings->slogan}}"</p>
            </div>

            <!-- Social + elérhetőség -->
            <div class="col-md-3">
                <h5>{{__("contact")}}</h5>
                <p class="mb-1">
                    <a href="mailto: {{$globalSettings->admin_email}}">
                        <span><i class="fa-regular fa-envelope"></i></span>
                        <span>{{$globalSettings->admin_email}}</span>
                    </a>
                </p>
                <p class="mb-2">
                    <a href="tel: {{$globalSettings->admin_phone}}">
                        <span><i class="fa-solid fa-mobile-screen-button"></i></span>
                        <span>{{$globalSettings->admin_phone}}</span>
                    </a>
                </p>
                <div class="mb-3 mb-md-0">
                    <div class="py-3"></div>
                    <h5>{{__("follow_channels")}}</h5>
                    @php
                        $socials = [
                            'facebook'   => ['url' => $globalSettings->facebook_url,   'icon' => 'fab fa-facebook',  'class' => 'facebook'],
                            'instagram'  => ['url' => $globalSettings->instagram_url,  'icon' => 'fab fa-instagram', 'class' => 'instagram'],
                            'linkedin'   => ['url' => $globalSettings->linkedin_url,   'icon' => 'fab fa-linkedin',  'class' => 'linkedin'],
                            'youtube'    => ['url' => $globalSettings->youtube_url,    'icon' => 'fab fa-youtube',   'class' => 'youtube'],
                            'tiktok'     => ['url' => $globalSettings->tiktok_url,     'icon' => 'fab fa-tiktok',    'class' => 'tiktok'],
                            'behance'    => ['url' => $globalSettings->behance_url,    'icon' => 'fab fa-behance',   'class' => 'behance'],
                            'pinterest'  => ['url' => $globalSettings->pinterest_url,  'icon' => 'fab fa-pinterest', 'class' => 'pinterest'],
                            'x'          => ['url' => $globalSettings->x_url,          'icon' => 'fab fa-x-twitter', 'class' => 'x'],
                            'designs99'  => ['url' => $globalSettings->designs99_url,  'icon' => 'fas fa-globe',     'class' => 'designs99'],
                        ];

                        $validSocials = collect($socials)->filter(fn($s) => !empty($s['url']) && $s['url'] !== "#");
                    @endphp

                    <div class="social-icons justify-content-center justify-content-md-start">
                        @foreach($validSocials as $social)
                            <a href="{{ $social['url'] }}" class="icon {{ $social['class'].' '.(!$loop->last ? 'me-2' : '') }}">
                                <i class="{{ $social['icon'] }} fa-lg"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Top 5 portfólió -->
            <div class="col-md-3">
                <h5>{{__("featured_projects")}}</h5>
                <ul class="list-unstyled">
                    {{-- project-item featured classeknek még nincs css szabályai --}}
                    <li><a href="#" class="project-item featured">Webshop redesign</a></li>
                    <li><a href="#" class="project-item featured">Mobil app UI</a></li>
                    <li><a href="#" class="project-item featured">Fotós portfólió</a></li>
                    <li><a href="#" class="project-item featured">Landing page kampány</a></li>
                    <li><a href="#" class="project-item featured">Corporate branding</a></li>
                    {{-- lehet több is amíg szépen nézki --}}
                </ul>
            </div>

            <!-- Menü -->
            <div class="col-md-3">
                <h5>{{__("menu")}}</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('portfolio')}}" class="">{{__("portfolio")}}</a></li>
                    <li><a href="{{route('about')}}" class="">{{__("about")}}</a></li>
                    <li><a href="{{route('blog.index')}}" class="">{{__("blog")}}</a></li>
                    <li><a href="{{route('contact')}}" class="">{{__("contact")}}</a></li>
                    {{-- privacy?, terms?, faq?, sitemap? --}}
                </ul>
            </div>
        </div>

        <!-- 4. sor: copyright -->
        <div class="text-center small border-top pt-3 px-2 px-md-3 px-lg-4 px-xl-5">
            {{-- felétel false így nem talál launch_date-et --}}
            &copy; @if (false) {{ $globalSettings->website_launch_date.' - ' }} @endif {{date('Y')}} {{config('app.name', 'Laravel')}}. {{$globalSettings->admin_email}}. {{__("all_rights_reserved")}}
        </div>
    </footer>


    <!-- contact btn -->
    <button id="index-contact-btn" class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasContact" aria-controls="offcanvasContact">
        <span><i class="fa-regular fa-envelope"></i></span>
        <span class="text-uppercase">{{__("level_up")}}</span>
    </button>
    <!-- contact btn -->

    <!-- contact offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasContact" aria-labelledby="offcanvasContactLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasContactLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{__("close")}}"></button>
        </div>
        <div class="offcanvas-body">
            {{-- contact űrlap --}}
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- contact offcanvas vége -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Oldalspecifikus Javascript -->
    @stack('scripts')
</body>
</html>
