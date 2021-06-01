<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Markplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Marketplace</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif" >
                        <a class="nav-link" aria-current="page" href="{{ route('admin.stores.index') }}">Lojas</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Produtos</a>
                    </li>
                </ul>
                <div class="navbar-nav ml-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="event.preventDefault();
                            document.querySelector('form.logout').submit();" aria-current="page">Sair</a>
                            <form action="{{ route('logout') }}" class="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->user()->name }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @endauth
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>