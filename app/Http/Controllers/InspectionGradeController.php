<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class InspectionGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grades = Grade::where('inspection_id', $id)->with('gradeType')->get();;
        return $grades? $grades: 'error';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $gradeId)
    {
        $grade = Grade::where('id', $gradeId)->where('inspection_id', $id)->with('gradeType')->get();;
        return $grade? $grade: 'error';
    }
}
