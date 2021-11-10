<?php

use App\Controller\Admin\AuthController;
use App\Controller\Home;
use App\Controller\InmateController;
use System\Routes\Route;

Route::get('/', [Home::class, 'index']);

//auth routes
Route::group(['prefix' => 'auth'], function(){

    Route::post('/user', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/create', [AuthController::class, 'create']);

});

//inmate routes
Route::group(['prefix' => 'inmate'], function(){
    Route::get('', [InmateController::class, 'index']);
});



