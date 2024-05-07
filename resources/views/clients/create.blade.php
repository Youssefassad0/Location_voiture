@extends('layouts.index')
@section('title')
    ajouter une voiture
@endsection

@section('content')
    <button class="btn btn-primary">
        <a href="{{ route('clients.index') }}" style="color: aliceblue;text-decoration:none;">Back
            Home</a></button>
    <h1 class="text-center">ajouter une voiture</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom de client</th>
                    <td> <input type="text" name="nom" class="form-input" value="{{ old('nom') }}">
                        @error('nom')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>prenom</th>
                    <td> <input type="text" name="prenom" class="form-input" value="{{ old('prenom') }}">
                        @error('prenom')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>numero de permis</th>
                    <td> <input type="number" name="num_permis" class="form-input" value="{{ old('num_permis') }}">
                        @error('num_permis')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Save Client</button>
    </form>
@endsection
