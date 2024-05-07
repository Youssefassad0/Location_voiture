<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" </head>
    <style>
        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin-top: 70px;
        }

        .title {
            margin-top: 20px
        }

        .menu {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 30px;
            padding-bottom: 40px;
        }
    </style>

<body class="container mt-5">
    @if (Session()->has('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <div class="welcome">
@auth
<a href="{{ route('logout') }}" style="color: green ; text-decoration:none;">Logout</a>
    
@endauth
        <div class="title">
            <h1 class="text-align-center">Welcome To the AssadLocation</h1>
        </div>
        <div class="menu">
            <h5>Here is The Menu : </h5>
            <a href="{{ route('voitures.index') }}">Gestion des voitures occupée </a>
            <a href="">Gestion des Clients</a>
            <a href="">Gestion des voitures occupée </a>
        </div>
    </div>
</body>

</html>
