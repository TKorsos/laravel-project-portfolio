@extends('layouts.app')

@section('title', $globalSettings->main_title)

@section('content')
    {{-- hero szekció --}}
    @if ( $globalSettings->display_hero == "1")
    <section class="row row-cols-1">
        <article class="col d-flex flex-column gap-3">
            <div id="hero-container">
                <div class="card text-bg-dark border-0 rounded-0">
                    <div id="hero-video">
                        @if (file_exists(public_path( $globalSettings->hero_video_url )))
                            <video class="card-img" controls autoplay muted loop>
                                <source src="{{ asset($globalSettings->hero_video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset($globalSettings->hero_img_url) }}" alt="Fallback kép" width="100%" height="100%">
                        @endif
                    </div>
                    <div class="card-img-overlay hero-text-container px-2 px-md-3 px-lg-4 px-xl-5">
                        <h1 id="hero-title" class="card-title">{{$globalSettings->hero_title}}</h1>
                        <div id="hero-text" class="card-text d-flex flex-column flex-md-row gap-3">
                            <span id="hero-whitespace" class="d-inline-block"></span>
                            <span id="hero-text-paragraph" class="d-inline-block">
                                <p>{!! $globalSettings->hero_content !!}</p>
                            </span>
                        </div>
                        <div id="hero-cta-btn-container" class="d-flex flex-column flex-md-row justify-content-md-end gap-3">
                            <span id="hero-whitespace" class="d-inline-block"></span>
                            <span id="hero-cta-btn" class="d-inline-block">
                                <a class="" href="{{ $globalSettings->hero_button_url == '#' ? '#' : route($globalSettings->hero_button_url) }}">
                                    {{ $globalSettings->hero_button_text }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="row whitespace-row-custom">
        {{-- globalSettings->slogan --}}
    </section>
    @endif
    {{-- hero szekció --}}
    
    {{-- portfólió szekció --}}
    <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if ($globalCategories && $globalCategories->count() > 0)
            @foreach ($globalCategories as $item)
                <article class="col">
                    <div class="index-portfolio">
                        <div class="d-flex w-100 h-100">
                            <a href="{{ route('portfolio.category', ['category'=> $item->slug]) }}" class="d-flex flex-column justify-content-center align-items-center w-100 h-100 text-center index-portfolio-img-container">  
                                <img class="index-portfolio-imgs" src="{{asset($item->image_path)}}" alt="{{ $item->description ? $item->description : $item->name }}" width="100%" height="100%">
                                <h5 class="index-portfolio-title">{{ $item->name }}</h5>
                                <span class="index-portfolio-fake-btn">Megnézem</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        @endif
    </section>
    <section class="row whitespace-row-custom">
        {{-- ??? --}}
    </section>
    {{-- portfólió szekció --}}

@endsection