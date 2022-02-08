@extends('layout')

@section('page_title')
    Каталог статей
@endsection

@section('articles_pointer')
    active
@endsection

@section('page_content')
    <div class="container">
        <ul>
            <li><a href="/article">статья1</a></li>
            <li><a href="/article">статья2</a></li>
            <li><a href="/article">статья3</a></li>
            <li><a href="/article">статья4</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Отзывы к статьям</h1>
        @foreach($comments as $comment)
            <div class="alert alert-warning">
                <h3>{{ $comment->subject }}</h3>
                <p>{{ $comment->body }}</p>
            </div>
        @endforeach
    </div>
@endsection