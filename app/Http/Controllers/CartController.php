<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    function index(){
        return view('cart');
    }

    function store(Request $request)
    {
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Medicine');

        return redirect()->route('list.index')->with('success_message', 'Item was added');
    }
    
    // function empty(){
    //     Cart::destroy();
    // }
    function destroy($id){
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');

    }


}
