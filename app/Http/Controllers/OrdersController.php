<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\CustomerOrder;

class OrdersController extends Controller
{
    //
    function index(){
        $orders = auth()->user()->orders()->with('products')->get();  // n + 1 issues
        return view('my-orders')->with('orders',$orders);
    }

    function show(CustomerOrder $order){
        $products = $order->products;
        return view('my-order')->with([
            'order' => $order,
            'products' => $products
        ]);
    }

}
