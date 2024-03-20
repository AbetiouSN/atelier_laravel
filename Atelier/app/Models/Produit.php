<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prix','quantite', 'description'];
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'produit_id');
    }

}
