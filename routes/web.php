<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\EntreeStockController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortieStockController;
use App\Models\ProduitsModel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $produits = ProduitsModel::orderBy('created_at', 'desc')->paginate(50);
    return view('dashboard', ['produits' => $produits]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/')->name("dashboard.")->group(function () {
    Route::get('/commandes', [CommandesController::class, 'commandes'])->name('commandes');
    Route::get('/ajouter-un-produit', [ProductsController::class, 'add_product'])->name('commandes.add_produits');
    Route::post('/ajouter-un-produit', [ProductsController::class, 'save_product']);
    Route::post('/ajouter-une-catégorie', [ProductsController::class, 'save_categorie'])->name('commandes.add_categorie');
    Route::post('/ajouter-un-fournisseur', [FournisseurController::class, 'save_fournisseurs'])->name('fournisseur.add_fournisseur');
    Route::get('/fournisseurs', [FournisseurController::class, 'fournisseurs'])->name('fournisseurs');
    Route::get('/entree-de-stock', [EntreeStockController::class, 'entree_stock'])->name('entree_stock');
    Route::get('/sortie-de-stock', [SortieStockController::class, 'sortie_stock'])->name('sortie_stock');
    Route::get('/clients', [ClientsController::class, 'clients'])->name('clients');
    Route::post('/ajouter-le-client', [ClientsController::class, 'save_clients'])->name('clients.add_clients');
    Route::post('/ajouter-la-commande', [CommandesController::class, 'save_commandes'])->name('commandes.add_commande');
});
require __DIR__ . '/auth.php';