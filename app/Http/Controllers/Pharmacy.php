<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pharmacy extends Controller
{
    //
    function index(){
        return "Welcome to the shop!";
    }

    function list(){
        return view('list');
    }
    function covidDetails(){
        return view('covid');
    }
}
