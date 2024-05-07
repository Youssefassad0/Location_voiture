@extends('layouts.index')
@section('title', 'Tous les voitures')

@section('style')
    <style>
        /* Déplacer les styles de la section 'style' ici */
        #show {
            text-decoration: none;
            color: black;
        }

        #show:hover {
            text-decoration: underline;
        }

        .alert {
            position: absolute;
            top: 2rem;
            right: 2rem;
        }

        .filter-form {
            margin-bottom: 20px;
            /* Ajouter un espace en bas du formulaire */
        }
    </style>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h1>Liste des Voitures Occupées</h1>
        <div>
            <a href="{{ url('/') }}" class="btn btn-success">Accueil</a>
            <a href="{{ route('voitures.create') }}" class="btn btn-primary">Ajouter une voiture</a>
        </div>
    </div>

    <form action="{{ route('voitures.filtrer') }}" method="POST" class="filter-form">
        @csrf
        <label for="date">Afficher les voitures louées pendant cette date :</label>
        <input type="date" class="form-control" name="date" id="date">
        @error('date')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Filtrer</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Voiture</th>
                <th>Client</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voitures as $voiture)
                <tr>
                    <td>{{ $voiture->immatriculation }}</td>
                    <td>{{ $voiture->nom }}</td>
                    <td>{{ $voiture->getClient($voiture->id) }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('voitures.edit', $voiture->id) }}" class="btn btn-success">Modifier</a>
                        <form action="{{ route('voitures.destroy', $voiture->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <a href="{{ route('voitures.show', $voiture->id) }}" id="show">Détails</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $voitures->links() }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('alert').style.display = "none";
        }, 2000);
    </script>
@endsection
