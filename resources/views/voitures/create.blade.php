@extends('layouts.index')
@section('title')
    ajouter une voiture
@endsection
@section('style')
@endsection
@section('content')
    <button class="btn btn-primary"><a href="{{ route('voitures.index') }}" style="color: aliceblue;text-decoration:none;">Back
            Home</a></button>
    <h1 class="text-center">ajouter une voiture</h1>

    <form action="{{ route('voitures.store') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Id club</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nom"></td>
                    <td><input type="text" name="prenom"></td>
                    <td>
                        <select name="id_club" class="form-select">
                            @foreach ($Clients as $Client)
                                <option value="{{ $Client->id }}">
                                    {{ $Client->nom .' '.$Client->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><button type="submit" class="btn btn-success">Ajouter</button></td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
