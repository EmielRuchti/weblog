@extends('layouts.app')

@section('title', 'Premium')

@section('content')
    <h1>Weblog Premium</h1>
    @if($is_premium === 1)
        <h2>U bent al een Premium Gebruiker</h2>
    @else
        <form action="{{ route('users.edit') }}" method="POST">
        @csrf
            <button name='premium' value='premium'>Get Premium</button>
        </form>
    @endif
@endsection