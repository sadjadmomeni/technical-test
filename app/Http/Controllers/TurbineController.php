<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\TurbineResource;
use App\Models\Turbine;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TurbineResource::collection(Turbine::all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $turbine = Turbine::find($id);
        return $turbine? new TurbineResource($turbine): ErrorResource::notFound();
    }
}
