<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Turbine;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turbines = Turbine::all();
        return $turbines ? $turbines: 'error';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turbine = Turbine::find($id);
        return $turbine ? $turbine: 'error';
    }
}
