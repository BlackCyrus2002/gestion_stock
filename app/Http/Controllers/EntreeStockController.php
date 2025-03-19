<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntreeStockController extends Controller
{
    public function entree_stock()
    {
        return View('dashboard.entree_stock');
    }
}