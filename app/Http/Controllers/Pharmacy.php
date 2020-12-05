<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\category;
use Illuminate\Http\Request;

class Pharmacy extends Controller
{
    //
    function index(){
        $medicines = Medicine::inRandomOrder()->take(3)->get();
        return view('home')->with('medicines', $medicines);
    }

    function list(){
        // return view('list');
        $medicines = Medicine::inRandomOrder()->get();
        $categories = category::all();

        return view('list')->with([
            'medicines'=> $medicines,
            'categories' => $categories,
        ]);
    }
    function covidDetails(){
        return view('covid');
    }
}
