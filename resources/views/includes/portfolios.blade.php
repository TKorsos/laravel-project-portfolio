@extends('layouts.app')

{{-- adott portfólió kategória megjelenítése --}}
@section('title', $category->name.' - Várkuti Tünde Krisztina tervezőgrafikus')

@section('content')
    {{-- portfólió kategória + portfólió elemei --}}
    <h1>{{$category->name}}</h1>
    <h2>{{$category->subtitle}}</h2>
    <p>{{$category->description}}</p>
    <img src="{{ asset($category->image_path) }}" alt="{{ $category->description ? $category->description : $category->name }}">
@endsection