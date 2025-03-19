<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\CategoriesModel;
use App\Models\FournisseursModel;
use App\Models\ProduitsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    public function add_product()
    {
        $categories = CategoriesModel::all();
        $fournisseurs = FournisseursModel::all();
        return View('dashboard.produits.add_produits', [
            'categories' => $categories,
            'fournisseurs' => $fournisseurs
        ]);
    }
    public function save_product(ProductRequest $product_request, ProduitsModel $produits)
    {
        $request = $product_request->validated();
        $produits->fill($request);

        if ($produits->save()) {
            return back()->with('success', 'Le produits a bien été enregistré');
        }
        return back()->with('error', 'Une erreur est survenue');
    }
    public function save_categorie(Request $request, CategoriesModel $categories)
    {
        $valid_request = $request->validate([
            'nom' => ['required'],
            'description' => ['required']

        ]);
        $categories->fill($valid_request);
        if ($categories->save()) {
            return back()->with('success', 'La catégorie a bien été enregistré');
        }
        return back()->with('error', 'Une erreur est survenue');
    }
}