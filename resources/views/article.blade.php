@extends('layout')

@section('page_title')
    Статья {{ $article->time }}
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
        <div class="row">
            <p><a class="likes" href="/like/increment/{{ $article->slug }}">Лайки:</a> {{ $article->likes }}</p>
            <form action="/like/increment/{{ $article->id }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Лайкнуть</button>
            </form>
            <p><a class="views" href="#">Просмотры:</a> {{ $article->views }}</p>
        </div>
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

        <form action="/comment/check" method="post">
            @csrf
            <input type="hidden" name="article_id" id="article_id" value='{{ $article->id }}'>
            <input type="hidden" name="article_slug" id="article_slug" value='{{ $article->slug }}'>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.likes').click(function(){
                console.log("IT WORKS")
            });

            $('.views').click(function(){
                console.log("IT WORKS")
            });
        });
    </script>
@endsection