@extends('layouts.app')

@section('title', 'Nieuwe category')

@section('content')
    <h1>Nieuwe category aanmaken</h1>
    <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <button type="submit">Opslaan</button>
    </form>
@endsection