<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FournisseursModel extends Model
{
    use HasFactory;
    protected $table = "fournisseurs";
    protected $fillable = [
        'nom',
        'contact',
        'adresse',
        'email',
        'telephone'
    ];
}