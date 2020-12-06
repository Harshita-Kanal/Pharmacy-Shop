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
        if(request()->category){
            $medicines = Medicine::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);               
            })->get();
            $categories = category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        }
        else {
            $medicines = Medicine::inRandomOrder()->get();
            $categories = category::all();
            $categoryName = 'All Items';
        }
       
        
        return view('list')->with([
            'medicines'=> $medicines,
            'categories' => $categories,
            'categoryName' => $categoryName

        ]);
    }

    function show($slug){
           $medicine = Medicine::where('slug', $slug)->firstOrFail();
           return view('medicine')->with('medicines', $medicine);
    }


    function covidDetails(){
        return view('covid');
    }
}
