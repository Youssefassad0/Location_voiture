<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;

class CleintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'num_permis' => 'required'
        ]);

        Client::create($validateData);

        return redirect()->route('clients.index')->with('success', 'client a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        $latestCars = Voiture::where('id_client', $id)
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('clients.show', compact('client', 'latestCars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.update', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validateData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'num_permis' => 'required'
        ]);
        Client::find($id)->update($validateData);
        return redirect()->route('clients.index')->with('success', 'Client a été bien modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ok =   Client::find($id)->delete();
        if (!$ok) {
            return 'false';
        }
        return redirect()->route('clients.index')->with('success', 'le client a été bien supprimé');
    }
}
