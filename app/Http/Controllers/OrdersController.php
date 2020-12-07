<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    function index(){
        $orders = auth()->user()->user_orders;  // n + 1 issues
        return view('my-orders')->with(['orders' => $orders]);
    }

}
