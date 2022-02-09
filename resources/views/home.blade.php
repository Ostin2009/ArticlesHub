@extends('layout')

@section('page_title')
    Главная страница
@endsection

@section('home_pointer')
    active
@endsection

@section('page_content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">ArticleHub</h1>
        <p class="lead my-3">most cool stories here</p>
        <p class="lead mb-0"><a href="/articles" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>
    <div class="container">
        @foreach($articles as $article)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">{{ $article->title }}</h3>
                        <p class="card-text mb-auto"><a href="article/{{ $article->id }}">{{ mb_substr(($article->content), 0, 99).'...' }}</a></p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

@endsection