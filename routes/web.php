<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


Route::get('/user-registration',[userController::class,'UserForm']);
Route::post('/register',[userController::class,'registration']);