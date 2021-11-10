<?php 
 namespace App\Controller;

use App\Controller\Admin\AuthController;
use App\Controller\BaseController;

 class InmateController extends BaseController 
 { 

    public function index()
    {
        if(!AuthController::isLoggedIn())
        {
            
            return redirect('/');
        }
        $context = [
            'title' => "Imate Dashboard"
        ];

        return render('inmate.index', $context);
    }
 }