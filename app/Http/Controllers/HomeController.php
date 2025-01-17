<?php

namespace App\Http\Controllers;

use App\Models\Farm;
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
        $farms = Farm::all();
        return view('farms', ['farms' => $farms]);
    }

    public function show($id)
    {
        $farm = Farm::find($id);
        return view('home', ['farm' => $farm]);
    }
}