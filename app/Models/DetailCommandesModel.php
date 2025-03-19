<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommandesModel extends Model
{
    use HasFactory;
    protected $table = "detail_commandes";
    protected $fillable = ['commande_id', 'produit_id', 'quantite', 'prix_unitaire'];

    public function commande()
    {
        return $this->belongsTo(CommandesModel::class, 'commande_id');
    }

    public function produit()
    {
        return $this->belongsTo(ProduitsModel::class, 'produit_id');
    }
}