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
    <input type="hidden" name="user_id" value="1" />
    <button type="submit">Opslaan</button>
    </form>
@endsection