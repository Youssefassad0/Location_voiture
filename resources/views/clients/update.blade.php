@extends('layouts.index')
@section('title')
    ajouter une voiture
@endsection

@section('content')
    <button class="btn btn-primary">
        <a href="{{ route('clients.index') }}" style="color: aliceblue;text-decoration:none;">Back
            Home</a></button>
    <h1 class="text-center">Modifier un Client</h1>

    <form action="{{ route('clients.update',$client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom voiture</th>
                    <td> <input type="text" name="nom" class="form-input" value="{{ $client->nom }}">
                        @error('nom')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>prenom</th>
                    <td> <input type="text" name="prenom" value="{{ $client->prenom }}" class="form-input">
                        @error('prenom')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>num_permis</th>
                    <td> <input type="number" name="num_permis" value="{{ $client->num_permis }}" class="form-input">
                        @error('num_permis')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>


            </tbody>
        </table>
        <button type="submit" class="btn btn-success" >Save Changes </button>
    </form>
@endsection
