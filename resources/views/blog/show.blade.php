@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <section class="row top-section-padding">
        <article class="col px-2 px-md-3 px-lg-4 px-xl-5" itemscope itemtype="https://schema.org/BlogPosting">
            <h1 class="mb-4 text-center" itemprop="headline">{{ $post->title }}</h1>
            {{-- container? container-fluid? --}}
            <p>
                <small>{{__("written_by")}}: <span itemprop="author">{{ $post->user ? $post->user->name : __("unknown_author") }}</span></small><br>
                <small>{{__("published_by")}}: <time itemprop="datePublished" datetime="{{ $post->published_at->toIso8601String() }}">{{ $post->published_at->format('Y. m. d.') }}</time></small>
            </p>
        
            @if($post->image_url)
                <img src="{{ asset($post->image_url) }}" alt="{{ $post->title }}" itemprop="image" loading="lazy">
            @endif
        
            <div itemprop="articleBody">
                {!! $post->content !!}
            </div>
        </article>
    </section>
@endsection
