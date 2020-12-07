<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    function edit(){
        return view('my-profile')->with('user', auth()->user());
    }

    function update(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        // dd($request->all());
        if(! $request->filled('password')){
           $user ->fill($input)->save();
           return back()->with('success_message', 'Profile Updated Successfully!');

        }
        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message', 'Password and Profile Updated Successfully!');
    }
    
}
