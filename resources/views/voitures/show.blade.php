@extends('layouts.index')

@section('title')
    Détails de la voiture
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Détails de la voiture</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $voiture->nom }}</h5>
                        <p class="card-text"><strong>Immatriculation:</strong> {{ $voiture->immatriculation }}</p>
                        <p class="card-text"><strong>Numéro d'assurance:</strong> {{ $voiture->num_assurance }}</p>
                        <p class="card-text"><strong>Kilométrage:</strong> {{ $voiture->Kilometrage }}</p>
                        <p class="card-text"><strong>Date de début de location:</strong> {{ $voiture->date_debut_location }}</p>
                        <p class="card-text"><strong>Date de fin de location:</strong> {{ $voiture->date_fin_location }}</p>
                        <p class="card-text"><strong>Client:</strong> {{ $voiture->getClient($voiture->id_client) }} </p>
                        <hr>
                        <h5 class="card-title">Images</h5>
                        {{-- @foreach($voiture->images as $image)
                            <img src="{{ asset('storage/' . $image->chemin_image) }}" alt="{{ $image->nom }}" class="img-fluid mb-3">
                        @endforeach --}}
                        <a href="{{ route('voitures.index') }}" class="btn btn-primary">Retour à la liste des voitures</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
