<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\GradeTypeResource;
use App\Models\GradeType;
use Illuminate\Http\Request;

class GradeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GradeTypeResource::collection(GradeType::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $gradeType = GradeType::find($id);
        return $gradeType? new GradeTypeResource($gradeType): ErrorResource::notFound();
    }
}
