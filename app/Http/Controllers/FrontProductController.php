<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);
        return view('our_product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('our_product.product-details', compact('product'));
    }
}