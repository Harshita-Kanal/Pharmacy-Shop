<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOrder;
use App\Models\PatientOrders;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
use Cart;

class CheckoutController extends Controller
{
    //
    function index(){        
        if(auth()->user() && request()->is('guestCheckout')){
            return redirect()->route('checkout');
        }
        return view('checkout');
    }

    function decreaseQuantities(){
        foreach(Cart::content() as $item){
            $product = Medicine::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }

    }

    //race condition
    function productsAreNoLongerAvailable(){
        foreach (Cart::content() as $item){
           $product = Medicine::find($item->model->id);
           if($product->quantity < $item->qty){
               return true;
           }   
        }
        return false;
    }

    function store(Request $request){
        // $user = new User();

        // $user->name = request('name');
        // // $user->email = request('email');
        // $user->address = request('address');
        // $user->doctor = request('doctor');
        // $user->save();
        // $user = auth()->user();
        
        if($this->productsAreNoLongerAvailable()){
            return back()->withErrors('Sorry! One of the items in your cart is no longer available');
        }

        $total = Cart::subtotal();
        //insert into orders table 

        $order = UserOrder::create([
            'user_id'=> auth()->user() ? auth()->user()->id : null,
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
        Mail::send(new OrderPlaced($order));

        //decrease qquantities
        $this->decreaseQuantities();

        Cart::destroy();
        return redirect()->route('list.index')->with('success_message', 'Order Placed, A confirmation mail is sent!');    
    }
}
