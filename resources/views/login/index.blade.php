@extends('layouts.login')

@section('title', 'Login')

@section('content')
<h1>Login</h1>
    <form action="{{ route('login.authenticate') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <br>
    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Log in</button>
    </form>

    @if($errors->any())
        <h3 style='color:red'>{{$errors->first()}}</h3>
    @endif
@endsection