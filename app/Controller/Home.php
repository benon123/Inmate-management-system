<?php
namespace App\Controller;
use App\Controller\BaseController;
use System\Http\Request\Request;

class Home extends BaseController
{
    public function index() {

        $context = [
            'title' => 'LOGIN',
        ];
        return render('index', $context);
    }

    public function registerUser()
    {
        
        $context = [
            'title' => 'REGISTER',
        ];
        return render('form', $context);
    }

    public function addUser(Request $request)
    {
        
        $fname = $request->post('fname');
        $lname = $request->post('fname');

        $request->validate([
            'fname' => 'required',
            'lname' => 'required|max:30',
            'email' =>  'email',
            'age' => 'required|numeric'
        ]);
    }


}