@extends('layouts.index')
@section('title')
    ajouter une voiture
@endsection

@section('content')
    <button class="btn btn-primary">
        <a href="{{ route('voitures.index') }}" style="color: aliceblue;text-decoration:none;">Back
            Home</a></button>
    <h1 class="text-center">Modifier une voiture</h1>

    <form action="{{ route('voitures.update', $voiture->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom voiture</th>
                    <td> <input type="text" name="nom" class="form-input" value="{{ $voiture->nom }}">
                        @error('nom')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>immatriculation</th>
                    <td> <input type="text" name="immatriculation" value="{{ $voiture->immatriculation }}"
                            class="form-input">
                        @error('immatriculation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>num_assurance</th>
                    <td> <input type="number" name="num_assurance" value="{{ $voiture->num_assurance }}"
                            class="form-input">
                        @error('num_assurance')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Kilometrage</th>
                    <td> <input type="number" name="Kilometrage" value="{{ $voiture->Kilometrage }}" class="form-input">
                        @error('Kilometrage')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>date debut location</th>
                    <td> <input type="date" name="date_debut_location" value="{{ $voiture->date_debut_location }}"
                            class="form-input">
                        @error('date_debut_location')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>date fin location</th>
                    <td> <input type="date" class="form-input" name="date_fin_location"
                            value="{{ $voiture->date_fin_location }}">
                        @error('date_fin_location')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Le Client</th>
                    <td> <select name="id_client" class="form-select">
                            @foreach ($Clients as $club)
                                <option value="{{ $club->id }}" @if ($club->id === $voiture->id_client) selected @endif>
                                    {{ $club->nom . ' ' . $club->prenom }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_client')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Modifier </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
