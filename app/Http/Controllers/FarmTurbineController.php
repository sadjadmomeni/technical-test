<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\FarmTurbineResource;
use App\Models\Component;
use App\Models\Farm;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Http\Request;

class FarmTurbineController extends Controller
{
    /**
     * Display a listing of the farms.
     */
    public function index($id)
    {
        $turbines = Turbine::where('farm_id', $id)->get();
        return FarmTurbineResource::collection($turbines);
    }

    /**
     * Display the specified farm.
     *
     * @param  int  $id
     */
    public function show($id, $turbineId)
    {
        $turbine = Turbine::where('farm_id', $id)->where('id', $turbineId)->first();
        return $turbine? new FarmTurbineResource($turbine): ErrorResource::notFound();

    }
}
