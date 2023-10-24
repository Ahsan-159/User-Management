<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


// Route::get('/user-registration',[userController::class,'UserForm']);
// Route::post('/register',[userController::class,'registration']);
// Route::get('/users',[userController::class,'Users']);
// Route::get('/users/delete/{user_id}',[userController::class,'delete'])->name('delete');

Route::controller(userController::class)->group(function(){  // To Make Route Group
    Route::get('/user-registration','UserForm');
    Route::post('/register','registration'); // route to get data from Form
    Route::get('/register','UserForm');
    Route::get('/users','Users');
    Route::get('/users/delete/{user_id}','delete')->name('delete');
    Route::get('/single-user/{id}','singleUser');
});