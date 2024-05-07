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
    </style>
@endsection
@section('content')
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
                        <button class="btn btn-success">Modifier</button>
                        <button class="btn btn-danger">Supprimer</button>
                        <a href="" id="show">>>></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
