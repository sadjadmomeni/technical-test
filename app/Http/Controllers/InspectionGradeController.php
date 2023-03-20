<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\InspectionGradeResource;
use App\Models\Grade;
use Illuminate\Http\Request;

class InspectionGradeController extends Controller
{
    /**
     * Display a listing of the grades for the inspection.
     */
    public function index($id)
    {
        $grades = Grade::where('inspection_id', $id)->get();
        return InspectionGradeResource::collection($grades);
    }

    /**
     * Display the specified grade for the inspection.
     *
     * @param  int  $id
     */
    public function show($id, $gradeId)
    {
        $grade = Grade::where('id', $gradeId)->where('inspection_id', $id)->first();
        ;
        return $grade ? new InspectionGradeResource($grade) : ErrorResource::notFound();
    }
}