<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand app-name" href="#">Gestion des tickets</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link
                            {{request()->is('/') ? 'active' : ''}}"
                       aria-current="page" href="{{url('/')}}"
                    >Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                            {{request()->is('tickets') ? 'active' : ''}}"
                       href="{{url('tickets')}}"
                    >Mes tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                            {{request()->is('admin/user') ? 'active' : ''}}"
                       href="{{url('admin/user')}}"
                    >Espace administrateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                            {{request()->is('dashboard') ? 'active' : ''}}"
                       href="{{url('dashboard')}}"
                    >Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link
                            {{request()->is('signin') ? 'active' : ''}}"
                       href="{{url('signin')}}"
                    >Connexion</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Entrer l'ID d'un ticket" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>
<main class="container mt-5">
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
</body>
</html>
