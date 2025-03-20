<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitsModel extends Model
{
    use HasFactory;
    protected $table = "produits";
    protected $fillable = [
        'nom',
        'description',
        'code_barre',
        'prix_achat',
        'prix_vente',
        'quantite_stock',
        'seuil_alerte',
        'categorie_id',
        'fournisseur_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(CategoriesModel::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(FournisseursModel::class);
    }
    public function commandes()
    {
        return $this->belongsToMany(CommandesModel::class, 'detail_commandes', 'produit_id', 'commande_id')
            ->withPivot('quantite', 'prix_unitaire');
    }
}