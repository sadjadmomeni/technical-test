<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Return list of the inspections for a turbine.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspections = Inspection::all();
        return $inspections? $inspections: 'error';
    }

    /**
     * Return an inspection for the turbine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspections = Inspection::where('id', $id)->get();
        return $inspections? $inspections: 'error';
    }
}
