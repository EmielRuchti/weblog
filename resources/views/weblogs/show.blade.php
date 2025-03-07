@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>{{ $weblog->title }}</h1>
    <div>
        Categorien:
        @foreach($categories as $category)
            {{$category->name}} -
        @endforeach
    </div>
    <div>
        <h3>Text:</h3>
        {{ $weblog->body }}
    </div>

    <div>
        <h3>Afbeelding:</h3>
        <img src="{{$image}}" alt=''>
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
        <form action="{{ route('comments.store', $weblog->id)}}" method="POST">
        @csrf
        <label for="body">Text:</label>
        <textarea id="body" name="body"></textarea>
        <br>
        <button type="submit">Plaats commentaar</button>
        </form>
    </div>

    @if($errors->any())
    <h3 style='color:red'>{{$errors->first()}}</h3>
    @endif
@endsection