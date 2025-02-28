@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>{{ $weblog->title }}</h1>
    <div>
        {{ $weblog->body }}
    </div>

    <div>
        <h1>Commentaar</h1>
        @if ($comments->isEmpty())
            <p>Nog geen commentaar, plaats als eerste.</p>
        @else
        <ul>
            @foreach($comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        <h1>Geef je mening!</h1>
        <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <label for="body">Text:</label>
        <textarea id="body" name="body"></textarea>
        <br>
        <input type="hidden" name="weblog_id" value="{{$weblog->id}}" />
        <input type="hidden" name="user_id" value="1" />
        <button type="submit">Plaats commentaar</button>
        </form>
    </div>
@endsection