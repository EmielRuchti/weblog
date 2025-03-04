@extends('layouts.app')

@section('title', 'Alle categorien')

@section('content')
    <h1>Overzicht categorien</h1>
    <a href="{{ route('categories.create') }}">Maak nieuwe category aan.</a>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection