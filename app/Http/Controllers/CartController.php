<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cart;

class CartController extends Controller
{
    //
    function index(){
        return view('cart');
    }

    function update(Request $request, $id){

        $validator = Validator::make($request -> all(), [
            'quantity' => 'required|numeric|between: 1, 20'
        ]);

        if($validator->fails()){
            session()->flash('errors', collect(['Quantity Limit Exceeded!']));
            return response()->json(['success' => false], 400);
        }

        //check the quantity

        if($request->quantity > $request->productQuantity){
            session()->flash('errors', collect(['We currently do not enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);

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
