<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $medicines = Medicine::inRandomOrder()->take(3)->get();
        $categories = category::all();
        return view('home')->with(['medicines' => $medicines, 'categories' => $categories]);;
    }
}
