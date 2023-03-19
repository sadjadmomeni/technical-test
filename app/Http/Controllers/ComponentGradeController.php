<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentGradeResource;
use App\Http\Resources\ErrorResource;
use App\Models\Component;
use App\Models\Grade;
use Illuminate\Http\Request;

class ComponentGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $grades = Grade::where('component_id', $id)->get();;
        return ComponentGradeResource::collection($grades);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id, $gradeId)
    {
        $grade = Grade::where('id', $gradeId)->where('component_id', $id)->get();
        return $grade->isNotEmpty()? ComponentGradeResource::collection($grade): ErrorResource::notFound();
    }
}
