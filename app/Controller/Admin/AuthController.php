<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\User;
use System\Http\Request\Request;

class AuthController extends BaseController 
 { 
    public function login(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        $userData = User::find('username', $username);
        
        if(empty($userData))
        {
           return response()->json(202, 'Oops, account does not exist!');
        }

        if(!password()->verify($password, $userData->password))
        {
         return response()->json(202, 'Oops, invalid username or password!');
        }

        $message = array();

        switch ($userData->account_type) {
           case 'staff':
              $message['redirect'] = url('inmate/staff/dashboard');
              break;
           
            case 'super':
               $message['redirect'] = url('inmate/admin/dashboard');
               break;
           default:
               $message = [
                  'alert' => 'Authenticated!',
                  'redirect' => url('inmate')
               ];
              break;
        }

        return response()->json(200, $message);
        
    }
 }