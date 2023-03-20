<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Resources\ErrorResource;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ComponentResource::collection(Component::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $component = Component::find($id);
        return $component ? new ComponentResource($component) : ErrorResource::notFound();
    }
}