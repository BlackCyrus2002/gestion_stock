<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SortieStockController extends Controller
{
    public function sortie_stock()
    {
        return View('dashboard.sortie_stock');
    }
}