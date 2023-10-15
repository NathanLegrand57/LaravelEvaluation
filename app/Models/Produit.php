<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function ventes() {
        return $this->hasMany(Vente::class); // C'est la classe produit qui ira dans vente en tant que produit_id
    }

    public function marque() {
        return $this->belongsTo(Marque::class);
    }
}
