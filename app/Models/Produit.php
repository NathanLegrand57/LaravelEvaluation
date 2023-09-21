<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function vente() {
        return $this->belongsTo(Vente::class);
    }

    public function marques() {
        return $this->hasMany(Marque::class);
    }
}
