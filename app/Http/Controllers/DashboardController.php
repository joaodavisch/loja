<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Carrega todos os produtos
        $types = Type::all(); // Carrega todos os tipos de produto

        return view('dashboard', [
            'products' => $products,
            'types' => $types
        ]);
    }
}