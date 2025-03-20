<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesModel extends Model
{
    use HasFactory;
    protected $table = "commandes";
    protected $fillable = ['client_id', 'statut'];

    public function client()
    {
        return $this->belongsTo(ClientsModel::class);
    }

    public function produits()
    {
        return $this->belongsToMany(ProduitsModel::class, 'detail_commandes', 'commande_id', 'produit_id')
            ->withPivot('quantite', 'prix_unitaire');
    }
}