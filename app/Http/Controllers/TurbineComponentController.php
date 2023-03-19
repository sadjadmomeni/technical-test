<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\TurbineComponentResource;
use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Turbine;

class TurbineComponentController extends Controller
{
    /**
     * Display a listing of the components for the turbine.
     */
    public function index($id)
    {
        $components = Component::where('turbine_id', $id)->get();
        return TurbineComponentResource::collection($components);
    }

    /**
     * Return a specific component for the turbine.
     *
     * @param  int  $id
     * @param  int  $componentId
     */
    public function show($id, $componentId)
    {
        $component = Component::where('turbine_id', $id)->where('id', $componentId)->first();
        return $component? new TurbineComponentResource($component): ErrorResource::notFound();
    }
}
