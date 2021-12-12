<?php

use App\Controller\Admin\AdminController;
use App\Controller\Admin\AuthController;
use App\Controller\Home;
use App\Controller\InmateController;
use App\Controller\TransferController;
use System\Routes\Route;

Route::get('/', [Home::class, 'index']);

//auth routes
Route::group(['prefix' => 'auth'], function(){

    Route::post('/user', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/account', [Home::class, 'registerUser']);
    Route::post('/user/new', [AuthController::class, 'create']);

});

//inmate routes
Route::group(['prefix' => 'inmate'], function(){

    Route::get('/dashboard', [InmateController::class, 'index']);
    Route::post('/transfer/new', [TransferController::class, 'request']);
    Route::get('/dashboard/prison/{status}', [TransferController::class, 'requestHistory']);
    Route::get('/check', [InmateController::class, 'check']);
    Route::get('/dashboard/prisoners/all', [InmateController::class, 'prisonerListing']);
    Route::get('/dashboard/prisoner/{id}', [InmateController::class, 'showPrisonerProfile']);
    
});

//admin routes
Route::group(['prefix' => 'inmate/admin'], function() {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/dashboard/prisoner/new', [AdminController::class, 'register']);
        Route::post('/dashboard/prisoner/new', [AdminController::class, 'addNewPrisoner']);
        Route::get('/dashboard/prisoners/all', [AdminController::class, 'prisonersListing']);
        Route::get('/dashboard/prisoner/{id}', [AdminController::class, 'showPrisoner']);
        Route::get('/dashboard/prison/transfers/{status}', [AdminController::class, 'transferRequests']);
        Route::get('/dashboard/prison/transfer/{status}', [AdminController::class, 'transferRequestDetails']);
        Route::post('/dashboard/prison/transfer/actions', [AdminController::class, 'transferRequestsActions']);
        Route::get('/users/new', [AdminController::class, 'registerAdminUsers']);
        Route::post('/users/new/store', [AdminController::class, 'createAdminUserAccount']);
        Route::get('/users/all', [AdminController::class, 'userListing']);
        
});



