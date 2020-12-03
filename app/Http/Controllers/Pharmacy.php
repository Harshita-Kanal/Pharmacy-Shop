<?php

namespace App\Http\Controllers;
use App\Models\Medicine;

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
        return view('list')->with('medicines', $medicines);
    }
    function covidDetails(){
        return view('covid');
    }
}
