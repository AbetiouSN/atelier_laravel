<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function gettall()
{
    $commandes = Commande::with('client', 'produit')->get();

    return response()->json(['commandes' => $commandes]);
}


    public function commander($client_id, $produit_id)
    {
        $commande = Commande::create([
            'client_id' => $client_id,
            'produit_id' => $produit_id,
        ]);

        return response()->json(['commande' => $commande], 201);
    }

    public function afficherCommande($id)
    {
        $commande = Commande::with('client', 'produit')->find($id);

        if (!$commande) {
            return response()->json(['message' => 'Commande introuvable'], 404);
        }

        return response()->json(['commande' => $commande]);
    }
    public function afficherCommandeJoin($id)
{
    $commande = Commande::select('commandes.*', 'clients.name as client_name', 'produits.description as produit_description')
        ->join('clients', 'commandes.client_id', '=', 'clients.id')
        ->join('produits', 'commandes.produit_id', '=', 'produits.id')
        ->where('commandes.id', $id)
        ->first();

    if (!$commande) {
        return response()->json(['message' => 'Commande introuvable'], 404);
    }

    return response()->json(['commande' => $commande]);
}

}
