@extends('layout')

@section('page_title')
    Каталог статей
@endsection

@section('articles_pointer')
    active
@endsection

@section('page_content')
    {{ $articles->links() }}
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