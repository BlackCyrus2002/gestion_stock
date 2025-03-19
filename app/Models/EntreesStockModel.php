<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntreesStockModel extends Model
{
    use HasFactory;
    protected $table = "entrees_stock";
    protected $fillable = [
        'produit_id',
        'quantite',
        'fournisseur_id'
    ];

    public function produit()
    {
        return $this->belongsTo(ProduitsModel::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(FournisseursModel::class);
    }
}