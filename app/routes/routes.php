<?php

use App\Controller\Admin\AuthController;
use App\Controller\Home;
use System\Routes\Route;

Route::get('/', [Home::class, 'index']);

//auth routes
Route::group(['prefix' => 'auth'], function(){

    Route::post('/user', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

});

//users/register
Route::get('users/register', [Home::class, 'registerUser']);

Route::post('users/store', [Home::class, 'addUser']);



