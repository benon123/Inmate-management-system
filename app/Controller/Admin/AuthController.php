<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\PrisonerNextOfKin;
use App\Models\User;
use System\Http\Request\Request;

ini_set('display_errors', 0);
class AuthController extends BaseController 
 { 
    public function login(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        $userData = User::find($username, 'username')->orWhere('email', $username)->get();
        

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
              session(['admin' => $userData]);
              $message['redirect'] = url('inmate/admin/dashboard');
              break;
            case 'admin':
               session(['admin' => $userData]);
               $message['redirect'] = url('inmate/admin/dashboard');
               break;
           default:
               session(['user' => $userData]);
               $message = [
                  'message' => 'Authenticated!',
                  'redirect' => url('inmate/dashboard')
               ];
              break;
        }

        return response()->json(200, $message);
        
    }

    public function logout()
    {
       return $this->session()->end();
    }

    public function create(Request $request)
    {
         $username = $request->post('username');

         if(User::where('username', $username)->exists())
         {
            return response()->json(202, "username is already taken!");
         }

         $userData = [
            'email' => $request->post('email'),
            'username' => $username,
            'first_name' => $request->post('fname'),
            'last_name' => $request->post('lname'),
            'phone_number' => $request->post('phone_number'),
            'password' => password()->hash($request->post('password'))
         ];

         $user = new User($userData);
         
         if(!$user->save())
         {
            return response()->json(500, 'Account not created. Please try again later');
         }
         $inmate = [
            'p_id' => $request->post('inmate'),
            'next_of_kin' => $username
         ];
         $inmate = new PrisonerNextOfKin($inmate);
         $inmate->save();
         return response()->json(200, 'Account created successfully!');
    }



    public static function isLoggedIn(string $session_id = 'user')
    {
       $auth = new self;
       return $auth->session()->contains($session_id);
    }

 }