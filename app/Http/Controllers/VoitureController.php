<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::all();
        return view('voitures.index', compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Clients = Client::all();
        return view('voitures.create', compact('Clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required',
            'immatriculation' => 'required|unique:voitures|min:10',
            'num_assurance' => 'required|numeric',
            'Kilometrage' => 'required',
            'date_debut_location' => 'nullable|date',
            'date_fin_location' => 'nullable|date',
            'id_client' => 'required'
        ]);

        Voiture::create($validateData);

        return redirect()->route('voitures.index')->with('success', 'Voiture a été ajouté avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $voiture = Voiture::findOrFail($id);
        return view('voitures.show', compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Voiture::findOrFail($id)->delete();
        return redirect()->route('voitures.index')->with('success', 'la voiture a été bien supprimé');
    }
}