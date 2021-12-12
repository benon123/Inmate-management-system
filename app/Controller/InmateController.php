<?php 
 namespace App\Controller;

use App\Controller\Admin\AuthController;
use App\Controller\BaseController;
use App\Models\Notification;
use App\Models\Prisoner;
use App\Models\PrisonerNextOfKin;
use System\Http\Request\Request;

class InmateController extends BaseController 
 { 

    public function index()
    {
        if(!AuthController::isLoggedIn())
        {
            
            return redirect('');
        }
        $user = $_SESSION['user'];
        $context = [
            'title' => "Imate Dashboard",
            'user' => $user,
            'inmate' => PrisonerNextOfKin::find($user->username, 'next_of_kin')->get(),
            'notification' => Notification::where('sent_to', $user->username)
            ->where('is_read', 0)->orderBy('created_at', 'DESC')->get()
        ];

        return render('inmate.index', $context);
    }

    public function check()
    {
        $request = new Request();
        $p_id = $request->get('p_id');
        if(Prisoner::find($p_id, 'p_id')->doesNotExist())
        {
            return response()->json(202, "No inmate is registered with ID {$p_id}");
        }
        return response()->json(200, "Inmate exists");
    }


    public function prisonerListing()
    {
        $user = $_SESSION['user'];
        $context = [
            'title' => "Prisoners",
            'collection' => Prisoner::join('prisoner_next_of_kins', 'prisoners.p_id', 'prisoner_next_of_kins.p_id')
            ->where('prisoner_next_of_kins.next_of_kin', $user->username)->get(),
            'user' => $user,
            'notification' => Notification::where('sent_to', $user->username)
            ->where('is_read', 0)->orderBy('created_at', 'DESC')->get()
        ];
        return render('inmate.prisoner.listing', $context);
    }

    public function showPrisonerProfile($id)
    {
        $user = $_SESSION['user'];
        $context = [
            'title' => "Prisoner Details",
            'user' => $user,
            'collection' => Prisoner::find($id, 'p_id')->get(),
            'notification' => Notification::where('sent_to', $user->username)->where('is_read', 0)
            ->orderBy('created_at', 'DESC')->get()
        ];
        return render('inmate.prisoner.profile', $context);
    }
 }