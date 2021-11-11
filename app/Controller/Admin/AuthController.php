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

        $userData = User::find($username, 'username')->get();
        
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
              session(['staff' => $userData]);
              $message['redirect'] = url('inmate/staff/dashboard');
              break;
           
            case 'super':
               session(['super' => $userData]);
               $message['redirect'] = url('inmate/admin/dashboard');
               break;
           default:
               session(['user' => $userData]);
               $message = [
                  'alert' => 'Authenticated!',
                  'redirect' => url('inmate')
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
         $username = $request->get('username');

         if(User::where('username', $username)->exists())
         {
            return response()->json(202, "username is already taken!");
         }

         $userData = [
            'username' => $username,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => password()->hash($request->get('password'))
         ];

         $user = new User($userData);
         
         if(!$user->save())
         {
            return response()->json(500, 'Account not created. Please try again later');
         }
         return response()->json(200, 'Account created successfully!');
    }

    public static function isLoggedIn(string $session_id = 'user')
    {
       $auth = new self;
       return $auth->session()->contains($session_id);
    }
 }