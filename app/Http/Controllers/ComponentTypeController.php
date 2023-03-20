<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentTypeResource;
use App\Http\Resources\ErrorResource;
use App\Models\ComponentType;
use Illuminate\Http\Request;

class ComponentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ComponentTypeResource::collection(ComponentType::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $componentType = ComponentType::find($id);
        return $componentType ? new ComponentTypeResource($componentType) : ErrorResource::notFound();
    }
}