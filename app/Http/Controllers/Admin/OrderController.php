<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;

class OrderController extends Controller {
    public function store() {
        
        $order = new Order();
        
        $data = [];

        $data['user_id'] = auth()->user()->id;
        
        $total = 0;

        $cartItems = session('cart', []);
        dd($cartItems);

        
        foreach($cartItems as $cartItem) {
            $total += $cartItem['price'];
        }

        $data['total_price'] = $total;
        $data['status'] = "Pending";
        $order = $order->create($data);

        foreach($cartItems as $key => $cartItem) {
            $data = [];
            $order_item = new Order_item();
            $data['order_id'] = $order->id;
            $data['product_id'] = $key;
            $data['quantity'] = $cartItem['quantity'];
            $data['subtotal'] = $cartItem['price'];
            $order_item->create($data);
        }

        session()->forget('cart');
        return redirect()->route('home.index')->with('success', 'Order has been created, check your orders for more info!');
    }
}