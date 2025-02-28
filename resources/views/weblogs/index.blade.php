@extends('layouts.app')

@section('title', 'Overzicht')

@section('content')
    <h1>Overzicht weblogs</h1>
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