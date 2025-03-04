@extends('layouts.app')

@section('title', 'Nieuwe weblog')

@section('content')
    <h1>Nieuwe weblog aanmaken</h1>
    <form action="{{ route('weblogs.store') }}" method="POST">
    @csrf
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="body">Text:</label>
    <textarea id="body" name="body"></textarea>
    <br>
    <label for="category">Categorie:</label>
    <select name="category_id" id="category" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Opslaan</button>
    </form>
@endsection