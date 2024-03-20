<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return response()->json(['produits' => $produits]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' =>'string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'description' => 'required|string'
        ]);

        $produit = Produit::create($request->all());

        return response()->json(['produit' => $produit], 201);
    }

    public function show(Produit $produit)
    {
        return response()->json(['produit' => $produit]);
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom'=> 'string',
            'prix' => 'numeric',
            'quantite' => 'integer',
            'description' => 'string'
        ]);

        $produit->update($request->all());

        return response()->json(['message' => 'Produit mis à jour']);
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return response()->json(['message' => 'Produit supprimé']);
    }
}
