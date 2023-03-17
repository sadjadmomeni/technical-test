<?php

namespace App\Http\Controllers;

use App\Models\ComponentType;
use Illuminate\Http\Request;

class ComponentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentTypes = ComponentType::all();
        return $componentTypes? $componentTypes: 'error';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $componentType = ComponentType::where('id', $id)->get();
        return $componentType? $componentType: 'error';
    }
}
