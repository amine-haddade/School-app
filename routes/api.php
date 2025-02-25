<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthJwtMiddlewaer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// ***** les route de users ***********

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


Route::middleware(AuthJwtMiddlewaer::class)->group(function(){
    Route::post('/index',[UserController::class,'index']);
});



// ***** les routes de groups *****//


// ***** les routes de majors *****//


// ***** les routes de timetable *****//