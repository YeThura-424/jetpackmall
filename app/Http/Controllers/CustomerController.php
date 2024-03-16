<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::role('customer')->get();
        return view('backend.customer',compact('customers'));
    }
}
