@extends('layouts.app')

@section('title', 'Várkuti Tünde Krisztina tervezőgrafikus')

@section('content')
    <section class="row row-cols-1 gap-3">
        <article class="col d-flex flex-column gap-3">
            <div id="hero-container">
                <div class="card text-bg-dark border-0 rounded-0">
                    <div id="hero-video">
                        <video class="card-img" controls autoplay muted loop>
                            <source src="{{ asset('assets/media/videos/libajatek.movie3.movie.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-img-overlay">
                        <h2 class="card-title fw-bold">Fő bemutatkozó szekció (Hero szekció)</h2>
                        <p class="card-text">Rövid, erős, személyes bemutatkozó szöveg designer névvel és szakmai fókuszsal, valamint egy látványos vizuális elem (például animált logó vagy portfólióból kiemelt kép). Egy call-to-action gomb segíti a felhasználót (pl. Portfólió megtekintése).</p>
                    </div>
                </div>
            </div>
        </article>
    </section>

@endsection