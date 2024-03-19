<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view ('backend.order.list',compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.order.detail',compact('order'));
    }
}
