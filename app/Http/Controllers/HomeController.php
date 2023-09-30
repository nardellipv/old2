<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;

class HomeController extends Controller
{
    public function index()
    {
        $prices = Product::where('show', 'Y')
        ->orderBy('price', 'ASC')
        ->get();

        $countClient = Client::count();

        $countProduct = Product::count();

        $countSale = Sale::count();

        return view('layouts.web', compact('prices','countClient','countProduct','countSale'));
    }
}
