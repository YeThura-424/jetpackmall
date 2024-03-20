<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::role('customer')->get()->count();
        $pendingOrder = Order::where('status','pending')->get()->count();
        return view('backend.dashboard',compact('users','pendingOrder'));
    }
}
