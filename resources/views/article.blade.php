@extends('layout')

@section('page_title')
    Статья
@endsection

@section('articles_pointer')
    active
@endsection

@section('page_content')


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
            <input type="text" name="subject" id="subject" placeholder="Тема сообщения" class="form-control"><br>
            <textarea name="body" id="body" placeholder="Текст сообщения" class="form-control"></textarea><br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection