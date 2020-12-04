<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOrder;
use App\Models\PatientOrders;
use Illuminate\Http\Request;

use Cart;

class CheckoutController extends Controller
{
    //
    function index(){        
        return view('checkout');
    }


    function store(Request $request){
        $user = new User();

        $user->name = request('name');
        // $user->email = request('email');
        $user->address = request('address');
        $user->doctor = request('doctor');
        $user->save();

        $total = Cart::subtotal();
        //insert into orders table 
        $order = UserOrder::create([
            'user_id'=> $user->id,
            'email' => $request->email,
            'name' => $request->name,
            'address' => $request->address,
            'doctor' => $request->doctor,
            'sub_total' => $total ,
        ]);

        //insert into product
        foreach(Cart::Content() as $item){
            PatientOrders::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                // 'quantity' => $item->qty

            ]);
        }

        Cart::destroy();
        return redirect()->route('list.index')->with('success_message', 'Order Placed');    
    }
}
