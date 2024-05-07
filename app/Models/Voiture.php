<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = ['immatriculation', 'nom', 'num_assurance', 'Kilometrage', 'date_debut_location', 'date_fin_location', 'id_client'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function getClient($id)
    {
        $client = Client::find($id);

        if ($client) {
            $nomComplet = $client->nom . ' ' . $client->prenom;
            return $nomComplet;
        } else {
            return 'Client introuvable';
        }
    }
}
