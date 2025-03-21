@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h2><a href="{{ route('categories.index') }}">Bekijk en maak nieuwe categorien</a></h2>

    @if($is_premium === 1)
        <h2>Premium Gebruiker</h2>
    @else
        <h2><a href="{{ route('profile.premium') }}">Get Premium</a></h2>
    @endif

    <h1>Overzicht eigen weblogs</h1>
    <table>
        <thead>
            <tr>
                <th>Titel</th>
                <th>Datum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($weblogs as $weblog)
                <tr>
                <td><a href="{{ route('weblogs.show', $weblog->id)}}">{{ $weblog->title }}</a></td>
                    <td>{{ $weblog->created_at }}</td>
                    <td>
                        <a href="{{ route('weblogs.edit', $weblog->id) }}">Bewerken</a>
                    </td>
                    <td>
                        <form onclick="return confirm('Weet u zeker dat u dit wilt verwijderen?')" action="{{ route('weblogs.destroy', $weblog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection