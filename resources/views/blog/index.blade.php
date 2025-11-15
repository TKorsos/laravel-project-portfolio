@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <section class="row top-section-padding">
        <div class="col px-2 px-md-3 px-lg-4 px-xl-5">
            <h1 class="mb-4 text-center blog-title">{{ __('Blogbejegyzések') }}</h1>
            <div class="container-fluid px-0">
                @if ($posts->count())
                    <div id="post-list" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @include('blog.partials.post-list', ['posts' => $posts])
                    </div>
                    @if ($posts->hasMorePages())
                        <div class="mt-4 text-center">
                            <button class="btn-outline-orange" id="load-more" data-next-page="{{ $posts->nextPageUrl() }}">
                                {{ __('Továbbiak megtekintése') }}
                            </button>
                        </div>
                    @endif
                @else
                    <p>{{ __('Nincsenek blogbejegyzések megjelenítésre') }}</p>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/blog.js') }}"></script>
@endpush