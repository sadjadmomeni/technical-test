<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Farm;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the farms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = Farm::all();
        return $farms ? $farms: 'error';
    }

    /**
     * Display the specified farm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farm = Farm::find($id);
        return $farm ? $farm: 'error';
    }
}
