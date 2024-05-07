@extends('layouts.index')

@section('title')
    Détails du client
@endsection

@section('style')
    <!-- Add your custom styles here -->
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Détails du client</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Informations du client</h2>
                <p><strong>Nom:</strong> {{ $client->nom }}</p>
                <p><strong>Prénom:</strong> {{ $client->prenom }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <!-- Add more client details here -->
            </div>
            <div class="col-md-6">
                <h2>Voitures récemment louées</h2>
                @if ($latestCars->isEmpty())
                    <p>Aucune voiture n'a été louée par ce client.</p>
                @else
                    <ul>
                        @foreach ($latestCars as $car)
                            <li>{{ $car->nom }} - {{ $car->immatriculation }}</li>
                            <!-- Add more car details here -->
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
