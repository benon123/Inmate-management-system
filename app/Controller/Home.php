<?php
namespace App\Controller;
use App\Controller\BaseController;
use App\Models\User;
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

    public static function addUser(Request $request)
    {
        
        $fname = $request->post('fname');
        $lname = $request->post('lname');
        $email = $request->post('email');
        $phone = $request->post('phone_number');
        $account_type = $request->post('account_type');
        $password = $request->post('password');
        $username = $request->post('username');

        $user = new User();
        $user->email = $email;
        $user->first_name = $fname;
        $user->last_name = $lname;
        $user->phone_number = $phone;
        $user->account_type = $account_type;
        $user->password = password()->hash($password);
        $user->username = $username;

        if(!$user->save())
        {
            return response()->json(202, alert()->danger("Failed to create account. Please try again later!!"));
        }

        return response()->json(200, alert()->success("Account for $fname $lname has been created successfully."));
    }


}