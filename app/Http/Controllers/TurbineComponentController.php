<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Turbine;

class TurbineComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $components = Component::where('turbine_id', $id)->with('componentType')->get();
        return $components? $components: 'error';
    }

    /**
     * Return a component for the turbine.
     *
     * @param  int  $id
     * @param  int  $componentId
     * @return \Illuminate\Http\Response
     */
    public function show($id, $componentId)
    {
        $component = Component::where('turbine_id', $id)->where('id', $componentId)->with('componentType')->get();
        return $component? $component: 'error';
    }
}
