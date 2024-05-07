<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageVoiture extends Model
{
    use HasFactory;
    protected $fillable = ['voiture_id', 'chemin_image'];
    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
