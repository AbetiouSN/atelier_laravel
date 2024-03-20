<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Créer un nouvel utilisateur
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Déterminer le rôle et créer l'enregistrement associé
        if ($request->role == 0) {
            // Créer un client
            $client = Client::create([
                'name' => $request->name,
                'address' => $request->address,
                'user_id' => $user->id,
            ]);
        } elseif ($request->role == 1) {
            // Créer un admin
            $admin = Admin::create([
                'name' => $request->name,
                'user_id' => $user->id,
            ]);
        }

       
        return response()->json(['message' => 'User created successfully'], 201);
    }
}
