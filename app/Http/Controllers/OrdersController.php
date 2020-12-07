<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;

class OrdersController extends Controller
{
    //
    function index(){
        $orders = auth()->user()->orders()->get();  // n + 1 issues
        return view('my-orders')->with('orders',$orders);
    }

}
