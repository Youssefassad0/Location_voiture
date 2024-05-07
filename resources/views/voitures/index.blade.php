@extends('layouts.index')
@section('title')
    Tous les voitures
@endsection
@section('style')
    <style>
        #show {
            text-decoration: none;
            color: black
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
            Liste Des Voitures disponibles
        </h1>
        <a href="{{ route('voitures.create') }}">Ajouter une voiture </a>
    </div>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Image</th>
                <th>voiture</th>
                <th>Client</th>
                <th>details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voitures as $voiture)
                <tr>
                    <td>{{ $voiture->immatriculation }}</td>
                    <td> {{ $voiture->nom }} </td>
                    <td> {{ $voiture->getClient($voiture->id) }} </td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('voitures.edit', $voiture->id) }}" class="btn btn-success">Modifier</a>
                        <form action="{{ route('voitures.destroy', $voiture->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                        <a href="{{ route('voitures.show', $voiture->id) }}" id="show">>>></a>
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
