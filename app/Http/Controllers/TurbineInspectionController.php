<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\TurbineInspectionResource;
use App\Models\Inspection;
use Illuminate\Http\Request;

class TurbineInspectionController extends Controller
{
    /**
     * Return list of the inspections for a turbine.
     *
     * @param  int  $id
     */
    public function index($id)
    {
        $inspections = Inspection::where('turbine_id', $id)->get();
        return TurbineInspectionResource::collection($inspections);
    }

    /**
     * Return an inspection for the turbine.
     *
     * @param  int  $id
     * @param  int  $inspectionId
     */
    public function show($id, $inspectionId)
    {
        $inspection = Inspection::where('turbine_id', $id)->where('id', $inspectionId)->first();
        return $inspection ? new TurbineInspectionResource($inspection) : ErrorResource::notFound();
    }
}