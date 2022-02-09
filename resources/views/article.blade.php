@extends('layout')

@section('page_title')
    Статья
@endsection

@section('articles_pointer')
    active
@endsection

@section('page_content')
    <div class="container">
        @foreach($article->tags as $tag)
            <h3>{{ $tag->name }}</h3>
        @endforeach
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <p>Лайков:{{ $article->likes }} Просмотров:{{ $article->views }}</p>
    </div>
    <div class="container">
        <h2>Форма добавления отзыва</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/comment/check/{{ $article->id }}" method="post">
            @csrf
            <input type="text" name="subject" id="subject" placeholder="Тема сообщения" class="form-control"><br>
            <textarea name="body" id="body" placeholder="Текст сообщения" class="form-control"></textarea><br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
    <div class="container">
        <h1>Отзывы к статьe</h1>
        @foreach($comments as $comment)
            <div class="alert alert-warning">
                <h3>{{ $comment->subject }}</h3>
                <p>{{ $comment->body }}</p>
            </div>
        @endforeach
    </div>
@endsection