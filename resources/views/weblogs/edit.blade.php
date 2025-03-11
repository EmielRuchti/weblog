@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<h1>Item Bewerken</h1>
<form action="{{ route('weblogs.update', $weblog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" value="{{ $weblog->title }}" required>
    <br>
    <label for="body">Text:</label>
    <textarea id="body" name="body">{{ $weblog->body }}</textarea>
    <br>
    <label for="category">Categorie:</label>
    <br>
    <select name="category_ids[]" id="category" multiple required>
        @foreach($categories as $category)
            <option name='categories_id[]' value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="image">Afbeelding:</label>
    <br>
    <input type='file' name='image' id='image'>
    <br>
    <label for='premium'>Premium Weblog:</label>
    <br>
    <input type='checkbox' name='premium' id='premium' value='1'>
    <br>
    <button type="submit">Bijwerken</button>
</form>

@if($errors->any())
    <h3>{{$errors->first()}}</h3>
@endif
@endsection