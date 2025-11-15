@extends('layouts.app')

@section('title', $globalSettings->main_title)

@section('content')
    <!-- hero szekció -->
    @if ( $globalSettings->display_hero == "1")
    <section class="row row-cols-1">
        <div class="col d-flex flex-column gap-3 full-width-box">
            <div id="hero-container">
                <div class="card text-bg-dark border-0 rounded-0">
                    <div id="hero-video">
                        @if (file_exists(public_path( $globalSettings->hero_video_url )))
                            <video class="card-img" controls autoplay muted loop>
                                <source src="{{ asset($globalSettings->hero_video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset($globalSettings->hero_img_url) }}" alt="Fallback kép" width="100%" height="100%" loading="lazy">
                        @endif
                    </div>
                    <div class="card-img-overlay hero-text-container px-2 px-md-3 px-lg-4 px-xl-5">
                        <h1 id="hero-title" class="card-title">{{$globalSettings->hero_title}}</h1>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row row-cols-1 whitespace-row-custom">
        {{-- css animálás --}}
        <div class="col-md-9 offset-md-2">
            <div id="hero-slogan">
                <span>
                    "{{ $globalSettings->slogan }}"
                </span>
            </div>
        </div>
        <div class="col-md-7 offset-md-4">
            <div id="hero-text" class="card-text d-flex flex-column flex-md-row gap-3">
                <div id="hero-text-paragraph" class="d-inline-block">
                    <p>{!! $globalSettings->hero_content !!}</p>
                </div>
            </div>
            <div id="hero-cta-btn-container">
                <div id="hero-cta-btn" class="d-inline-block">
                    <a class="link-underline-animation" href="{{ $globalSettings->hero_button_url == '#' ? '#' : route($globalSettings->hero_button_url) }}">
                        <span>
                            <i class="fa-solid fa-headset"></i>
                        </span>
                        <span>
                            {{ $globalSettings->hero_button_text }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- hero szekció vége -->
    
    <!-- portfólió szekció -->
    <section id="row-portfolio" class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if ($globalCategories && $globalCategories->count() > 0)
            @foreach ($globalCategories as $item)
                <div class="col full-width-box">
                    <div class="index-portfolio">
                        <div class="d-flex w-100 h-100">
                            <a href="{{ route('portfolio.category', ['category'=> $item->slug]) }}" class="d-flex flex-column justify-content-center align-items-center w-100 h-100 text-center index-portfolio-img-container">  
                                <img class="index-portfolio-imgs" src="{{asset($item->image_path)}}" alt="{{ $item->description ? $item->description : $item->name }}" width="100%" height="100%" loading="lazy">
                                <h5 class="index-portfolio-title">{{ $item->name }}</h5>
                                <span class="index-portfolio-fake-btn">Megnézem</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
    <section class="row whitespace-row-custom">
        {{-- contact gomb --}}
    </section>
    <!-- portfólió szekció vége -->

    <!-- rólam szekció -->
    <section class="row py-4">
        <div class="col px-2 px-md-3 px-lg-4 px-xl-5">
            <div id="index-about-container" class="d-flex flex-column flex-md-row align-items-center gap-4 gap-md-3 gap-lg-0">
                <div id="index-about-picture-container" class="d-flex justify-content-center">
                    <div class="d-flex flex-column justify-content-center w-100 h-100 overflow-hidden" >
                        <img id="index-about-img" src="https://picsum.photos/640?random=1" alt="Designer image" loading="lazy">
                    </div>
                </div>
                <div id="index-about-text-container" class="d-flex flex-column align-items-center">
                    <h2 id="index-about-title">Rólam</h2>
                    <p id="index-about-paragraph">
                        Kreatív designer vagyok, aki a modern minimalista stílust ötvözi a funkcionális megoldásokkal. Több éves tapasztalatot szereztem kiállítások szervezésében és design oktatásban. Diplomám a Moholy-Nagy Művészeti Egyetemről származik.
                    </p>
                    <a class="link-underline-animation" href="{{ $globalSettings->linkedin_url === '#' ? '#' : $globalSettings->linkedin_url }}">
                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                        LinkedIn profil
                    </a>
                    <a class="link-underline-animation" href="mailto: {{$globalSettings->admin_email}}">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                        Kapcsolatfelvétel
                    </a>
                    <a id="index-about-btn" href="{{ route('about') }}" class="btn btn-dark">
                        Tovább a rólam oldalra...
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="row whitespace-row-custom">
        {{-- contact gomb --}}
    </section>
    <!-- rólam szekció vége -->

    <!-- blog szekció vége -->
    <section id="blog-latest" class="row">
        <div class="col px-2 px-md-3 px-lg-4 px-xl-5">
            <h2 class="mb-4 text-center blog-title">{{ __('Legfrissebb blogbejegyzések') }}</h2>
            <div class="container-fluid px-0">
                @if($posts->count())
                    <div id="index-blog-container" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach($posts as $post)
                            <div class="blog col mx-auto" itemscope itemtype="https://schema.org/BlogPosting">
                                @include('includes.blog-meta')

                                <div class="card h-100 shadow-sm">
                                    @if($post->image_url)
                                        <img 
                                            src="{{ asset($post->image_url) }}" 
                                            srcset="{{ asset($post->image_url) }} 600w, {{ asset($post->image_medium_url ?? $post->image_url) }} 300w" 
                                            sizes="(max-width: 600px) 300px, 600px"
                                            class="card-img-top" 
                                            alt="{{ $post->title }}" 
                                            loading="lazy"
                                            itemprop="image"
                                        >
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        {{-- itemprop author, datePublished --}}
                                        <h5 class="card-title" itemprop="name">{{ $post->title }}</h5>
                                        <p class="card-text text-truncate" style="max-height: 6em;" itemprop="description">{!! Str::limit(strip_tags($post->excerpt ?? $post->content), 150) !!}</p>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="mt-auto btn btn-dark align-self-start" itemprop="url">{{__('Tovább olvasom')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 text-center btn-more-blog">
                        <a href="{{ route('blog.index') }}" class="btn-outline-orange">
                            {{__('További blogbejegyzések')}}
                        </a>
                    </div>
                @else
                    <p>{{ __('Nincsenek blogbejegyzések megjelenítésre') }}</p>
                @endif
            </div>
        </div>
    </section>
    <section class="row whitespace-row-custom">
        {{--
            ??? + contact gomb
            vásárlói értékelések következő szekció? ha lesz
        --}}
    </section>
    <!-- blog szekció vége -->

    <!-- bloghoz -->
    <script type="application/ld+json">
        {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endpush