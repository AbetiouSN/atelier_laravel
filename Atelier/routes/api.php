<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;

use App\Http\Controllers\CommandeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

Route::post('/users', [UserController::class, 'store'])->name('user.store');



Route::get('/produits', [ProduitController::class, 'index']);
Route::post('/produits', [ProduitController::class, 'store']);
Route::get('/produits/{produit}', [ProduitController::class, 'show']);
Route::put('/produits/{produit}', [ProduitController::class, 'update']);
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy']);


Route::get('/commandes',[CommandeController::class,'gettall']);
Route::post('/commandes/{client_id}/{produit_id}', [CommandeController::class, 'commander']);
Route::get('/commandes/{id}', [CommandeController::class, 'afficherCommande']);
Route::get('/commandesJoin/{id}', [CommandeController::class, 'afficherCommandeJoin']);

