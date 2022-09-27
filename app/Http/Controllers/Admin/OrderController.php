<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        return view('admin.orders.index');

    }

    public function create(){
        return view('admin.orders.create');
    }

    public function edit(Order $order){

        $order->load('orderDetails.design', 'orderDetails.product');

        return view('admin.orders.edit', compact('order'));
    }
}
