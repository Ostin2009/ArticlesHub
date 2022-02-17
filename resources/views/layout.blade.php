<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Article</span><span class="fs-4">HUB</span>
            </a>
            
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link @yield('main_pointer')" >Главная страница</a></li>
                <li class="nav-item"><a href="/articles" class="nav-link @yield('articles_pointer')">Каталог статей</a></li>
            </ul>
        </header>
    </div>
        
    @yield('page_content')
        
</body>
</html>