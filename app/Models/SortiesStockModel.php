<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortiesStockModel extends Model
{
    use HasFactory;
    protected $table = "sorties_stock";
    protected $fillable = ['produit_id', 'quantite', 'client_id'];

    public function produit()
    {
        return $this->belongsTo(ProduitsModel::class);
    }

    public function client()
    {
        return $this->belongsTo(ClientsModel::class);
    }
}