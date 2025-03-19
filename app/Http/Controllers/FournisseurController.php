<?php

namespace App\Http\Controllers;

use App\Http\Requests\FournisseursRequest;
use App\Models\FournisseursModel;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function fournisseurs()
    {
        $fournisseurs = FournisseursModel::orderBy('created_at', 'asc')->paginate(50);
        return View('dashboard.fournisseurs', ['fournisseurs' => $fournisseurs]);
    }
    public function save_fournisseurs(FournisseursModel $fournisseurs, FournisseursRequest $fournisseurs_request)
    {
        $request = $fournisseurs_request->validated();
        $fournisseurs->fill($request);
        if ($fournisseurs->save()) {
            return back()->with('success', 'Le fournisseur a bien été enregistré');
        }
        return back()->with('error', 'Une erreur est survenue');
    }
}