<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SessionEventController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeekController;
use App\Http\Middleware\AuthJwtMiddlewaer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return 'test';
});



// ***** les route de users ***********

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


Route::middleware(AuthJwtMiddlewaer::class)->group(function(){
    Route::get('users',[UserController::class,'index']);
});



// route de salle
Route::apiResource('classrooms',ClassroomController::class);

// route des dformatuers
Route::apiResource('trainers',TrainerController::class);

// ***** le route de filièrer *****//


Route::apiResource('fields',FieldController::class);


// ***** les routes de groups *****//
Route::apiResource('groups',GroupController::class);


// ***** les routes de module *****//

Route::apiResource('subjects',SubjectController::class);


// ***** les routes d‘affectation ***** //

Route::apiResource('assignment',AssignmentController::class);



// ***** les routes de annèe scolaire *****//
Route::apiResource('schoolyear',SchoolYearController::class);

// ***** les routes des semaines *****//
Route::apiResource('week',WeekController::class);

// ***** les routes des sciences  *****//
Route::apiResource('sessionevents',SessionEventController::class);

