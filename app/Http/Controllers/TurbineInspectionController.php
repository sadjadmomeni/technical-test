<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Turbine;

class TurbineInspectionController extends Controller
{
    /**
     * Return list of the inspections for a turbine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $inspections = Inspection::where('turbine_id', $id)->get();
        return $inspections? $inspections: 'error';
    }

    /**
     * Return an inspection for the turbine.
     *
     * @param  int  $id
     * @param  int  $inspectionId
     * @return \Illuminate\Http\Response
     */
    public function show($id, $inspectionId)
    {
        $inspections = Inspection::where('turbine_id', $id)->where('id', $inspectionId)->get();
        return $inspections? $inspections: 'error';
    }
}
