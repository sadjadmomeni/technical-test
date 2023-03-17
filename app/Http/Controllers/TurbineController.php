<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Turbine;

class TurbineController extends Controller
{
//    public function __construct()
//    {
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO = separate calls for inspections and components
        return Turbine::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Return list of the inspections for a turbine.
     *
     * @return \Illuminate\Http\Response
     */
    public function turbineInspections($id)
    {
        $inspections = Inspection::where('turbine_id', $id)->get();
        return $inspections;
    }

    /**
     * Return list of the components for a turbine.
     *
     * @return \Illuminate\Http\Response
     */
    public function turbineComponents($id)
    {
        $components = Component::where('turbine_id', $id)->with('componentType')->get();
        return $components;
    }
}
