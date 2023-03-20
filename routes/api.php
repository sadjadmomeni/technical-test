<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentGradeController;
use App\Http\Controllers\ComponentTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmTurbineController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeTypeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\InspectionGradeController;
use App\Http\Controllers\TurbineComponentController;
use App\Http\Controllers\TurbineController;
use App\Http\Controllers\TurbineInspectionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/farms', [FarmController::class, 'index']);
    Route::get('/farms/{id}', [FarmController::class, 'show']);

    Route::get('/farms/{id}/turbines', [FarmTurbineController::class, 'index']);
    Route::get('/farms/{id}/turbines/{turbineId}', [FarmTurbineController::class, 'show']);

    Route::get('/turbines', [TurbineController::class, 'index']);
    Route::get('turbines/{id}', [TurbineController::class, 'show']);

    Route::get('turbines/{id}/components', [TurbineComponentController::class, 'index']);
    Route::get('turbines/{id}/components/{componentId}', [TurbineComponentController::class, 'show']);

    Route::get('turbines/{id}/inspections', [TurbineInspectionController::class, 'index']);
    Route::get('turbines/{id}/inspections/{inspectionId}', [TurbineInspectionController::class, 'show']);

    Route::get('/components', [ComponentController::class, 'index']);
    Route::get('components/{id}', [ComponentController::class, 'show']);

    Route::get('components/{id}/grades', [ComponentGradeController::class, 'index']);
    Route::get('components/{id}/grades/{gradeId}', [ComponentGradeController::class, 'show']);

    Route::get('/inspections', [InspectionController::class, 'index']);
    Route::get('inspections/{id}', [InspectionController::class, 'show']);

    Route::get('inspections/{id}/grades', [InspectionGradeController::class, 'index']);
    Route::get('inspections/{id}/grades/{gradeId}', [InspectionGradeController::class, 'show']);

    Route::get('/grades', [GradeController::class, 'index']);
    Route::get('grades/{id}', [GradeController::class, 'show']);

    Route::get('/grade-types', [GradeTypeController::class, 'index']);
    Route::get('grade-types/{id}', [GradeTypeController::class, 'show']);

    Route::get('/component-types', [ComponentTypeController::class, 'index']);
    Route::get('component-types/{id}', [ComponentTypeController::class, 'show']);
});