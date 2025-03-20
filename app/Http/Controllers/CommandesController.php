<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandesRequest;
use App\Models\ClientsModel;
use App\Models\CommandesModel;
use App\Models\ProduitsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CommandesController extends Controller
{
    public function commandes()
    {
        $commandes = CommandesModel::orderBy('id', 'desc')->paginate(50);
        $produits = ProduitsModel::all();
        $clients = ClientsModel::all();
        return View('dashboard.commandes', [
            'commandes' => $commandes,
            'produits' => $produits,
            'clients' => $clients
        ]);
    }
    public function save_commandes(CommandesRequest $commandesRequest)
    {


        $request = $commandesRequest->validated();
        // Ajouter le statut à la commande
        $request['statut'] = 'en attente';
        // Créer une nouvelle commande
        $commandes = new CommandesModel();
        $commandes->fill($request);
        $commandes->save();

        /// Ajouter les produits à la commande avec les quantités et prix
        foreach ($request['produits'] as $produit) {
            $commandes->produits()->attach(
                $produit['id'],
                [
                    'quantite' => $produit['quantite'],
                    'prix_unitaire' => $produit['prix_unitaire'],
                ]
            );
        }


        return back()->with('success', 'La commande a bien été enregistrée.');
    }
}