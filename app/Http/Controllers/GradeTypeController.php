<?php

namespace App\Http\Controllers;

use App\Models\GradeType;
use Illuminate\Http\Request;

class GradeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradeTypes = GradeType::all();
        return $gradeTypes? $gradeTypes: 'error';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gradeType = GradeType::where('id', $id)->get();
        return $gradeType? $gradeType: 'error';
    }
}
