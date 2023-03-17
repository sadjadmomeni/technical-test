<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Farm;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Http\Request;

class FarmTurbineController extends Controller
{
    /**
     * Display a listing of the farms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $turbines = Turbine::where('farm_id', $id)->get();
        return $turbines ? $turbines: 'error';
    }

    /**
     * Display the specified farm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $turbineId)
    {
        $turbine = Turbine::where('farm_id', $id)->where('id', $turbineId)->get();
        return $turbine ? $turbine: 'error';
    }
}
