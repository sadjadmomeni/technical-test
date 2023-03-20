<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the farms.
     */
    public function index()
    {
        return FarmResource::collection(Farm::all());
    }

    /**
     * Display the specified farm.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $farm = Farm::find($id);
        return $farm ? new FarmResource($farm) : ErrorResource::notFound();
    }
}