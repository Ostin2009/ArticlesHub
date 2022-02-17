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
        <di class="row">
            
            <form action="/like/increment/{{ $article->id }}" method="post" class="like-form">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success like-button">Лайки: <span class="likes">{{ $article->likes }}</span></button>
            </form>
            <p>Просмотры: <span class="views">{{ $article->views }}</span></p>
        </div>
    </div>
    <div class="container">
    <form action="/comment/check" method="post" class="comment-send-form">
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

            @csrf
            <input type="hidden" name="article_id" id="article_id" value='{{ $article->id }}'>
            <input type="text" name="subject" id="subject" placeholder="Тема сообщения" class="form-control"><br>
            <textarea name="body" id="body" placeholder="Текст сообщения" class="form-control"></textarea><br>
            <button type="submit" class="btn btn-success comment-send-button">Отправить</button>
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
        <div class="new-comment"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var likeForm = $('.like-form');
            var commentForm = $('.comment-send-form');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
            });

            likeForm.on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'patch',
                    url: '/like/increment/{{ $article->id }}',
                    data: $(this).serialize()
                }).done(function(responce){
                    $('.likes').html(responce);
                });
            });

            commentForm.on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: '/comment/check',
                    data: $(this).serialize()
                }).done(function(responce){
                    $('.new-comment').html('<div class="alert alert-warning"><h3>'+responce.subject+'</h3><p>'+responce.body+'</p> </div>');
                    commentForm.html('<h1>Ваше сообщение доставлено!</h1>');
                });
            });

            function viewsIncrement() {
                $.ajax({
                    type: 'patch',
                    url: '/view/increment/{{ $article->id }}',
                    data: $(this).serialize()
                }).done(function(responce){
                    $('.views').html(responce);
                });
            }
            setTimeout(viewsIncrement, 5000);
        });
    </script>
@endsection
