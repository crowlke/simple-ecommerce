<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller  { 
    
    public function index() {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    } 

    public function store(Request $request, Product $product) {
        $data = $request->all();

        $product = $product->create($data);

        $category = Category::find($data['category']);

        $product->categories()->attach($category->id);
    
        return redirect()->route('home.index');
    }

    public function addProductToCart($id) {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,    
                'price' => $product->price,
                'subtotal' => $product->price,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    public function shoppingCart() {
        return view('cart.cart');
    }
}