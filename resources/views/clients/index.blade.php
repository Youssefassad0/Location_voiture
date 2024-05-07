@extends('layouts.index')
@section('title')
    Tous les voitures
@endsection
@section('style')
    <style>
        #show {
            text-decoration: none;
            color: rgb(255, 255, 255)
        }

        #show:hover {
            text-decoration: underline
        }

        .alert {
            position: absolute;
            top: 2rem;
            right: 2rem
        }
    </style>
@endsection
@section('content')
    @if (Session()->has('success'))
        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            Liste Des Clients
        </h1>
        <a href="{{ route('home') }}" class="btn btn-success">Accueil</a>
        <a href="{{ route('clients.create') }}">Ajouter un Client </a>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->nom }}</td>
                    <td>{{ $c->prenom }}</td>
                    <td class="d-flex justify-content-between">
                        <a class="btn btn-success" href="{{ route('client.update',$c->id) }}">Modifier</a>
                        <form method="POST"  action="{{ route('clients.destroy',$c->id) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                        <a id="show">view details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        setTimeout(() => {
            document.getElementById('alert').style.display = "none"
        }, 2000);
    </script>
@endsection
