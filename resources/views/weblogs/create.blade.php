@extends('layouts.app')

@section('title', 'Nieuwe weblog')

@section('content')
    <h1>Nieuwe weblog aanmaken</h1>
    <form action="{{ route('weblogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="body">Text:</label>
    <textarea id="body" name="body"></textarea>
    <br>
    <label for="category">Categorie:</label>
    <br>
    <select name="category_ids[]" id="category" multiple required>
        @foreach($categories as $category)
            <option name="category_ids[]" value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="image">Afbeelding:</label>
    <br>
    <input type='file' name='image' id='image'>
    <br>
    <button type="submit">Opslaan</button>
    </form>
@endsection