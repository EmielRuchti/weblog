@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<h1>Item Bewerken</h1>
<form action="{{ route('weblogs.update', $weblog->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" value="{{ $weblog->title }}" required>
    <br>
    <label for="body">Text:</label>
    <textarea id="body" name="body">{{ $weblog->body }}</textarea>
    <br>
    <label for="category">Categorie:</label>
    <select name="category_id" id="category" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $weblog->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    <button type="submit">Bijwerken</button>
</form>

@if($errors->any())
    <h3>{{$errors->first()}}</h3>
@endif
@endsection