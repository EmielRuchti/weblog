@extends('layouts.app')

@section('title', 'Overzicht')

@section('content')
    <h1>Overzicht weblogs</h1>

    <form action="{{ route('categories.show') }}" method="POST">
    @csrf
    <label for="category">Filter op categorien</label>
    <br>
    <select name="category_ids[]" id="category" required>
        <option value='select'>Selecteer een categorie</option>
        @foreach($categories as $category)
            <option name='categories_id[]' value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Titel</th>
                <th>Datum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($weblogs as $weblog)
                <tr>
                <td><a href="{{ route('weblogs.show', $weblog->id)}}">{{ $weblog->title }}</a></td>
                    <td>{{ $weblog->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection