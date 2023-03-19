<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\InspectionResource;
use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Return list of the inspections
     */
    public function index()
    {
        return InspectionResource::collection(Inspection::all());
    }

    /**
     * Return an inspection
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $inspections = Inspection::find($id);
        return $inspections? new InspectionResource($inspections): ErrorResource::notFound();
    }
}
