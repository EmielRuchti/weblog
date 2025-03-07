@extends('layouts.app')

@section('title', 'Alle categorien')

@section('content')
    <h1>Overzicht categorien</h1>
    <a href="{{ route('categories.create') }}">Maak nieuwe category aan.</a>
    <br>
    <h1>Naam:</h1>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection