<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller {
    public function index() {
        $categories = Category::all();
        $products = Product::filter()->with('categories')->get();
        
        return view('home.index', compact('products', 'categories'));
    }
}