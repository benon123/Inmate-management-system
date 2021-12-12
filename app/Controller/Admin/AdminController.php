<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Controller\Home;
use App\Models\Notification;
use App\Models\Prisoner;
use App\Models\PrisonerNextOfKin;
use App\Models\Transfer;
use App\Models\User;
use System\Database\DB;
use System\Http\Request\Request;

class AdminController extends BaseController 
 { 

    
    public function index()
    {
        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }

        $context = [
            'title' => "Dashboard",
            'prisoners' => Prisoner::all(),
            'transfers' => $this->countTransferRecords(),
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.index', $context);
    }


    private function countTransferRecords()
    {
        return array_to_object([
            'all' => DB::table('transfers')->count(),
            'pending' => Transfer::find('pending', 'transfer_status')->count('id'),
            'approved' => Transfer::find('approved', 'transfer_status')->count('id'),
            'denied' => Transfer::find('denied', 'transfer_status')->count('id'),
            'familty' => PrisonerNextOfKin::all()
        ]);
    }

    public function register()
    {
        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }

        $context = [
            'title' => "Prisoner Registration",
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.prisoner.register', $context); 
    }

    public function addNewPrisoner(Request $request)
    {
        $newPrisoner = $request->except([crsf()]);
        $prisoner = new Prisoner($newPrisoner);
        if(!$prisoner->save())
        {
            return response()->send(202, alert()->failure('New Prisoner not added!'));
        }
        return response()->send(200, alert()->success('New Prisoner added successfully!'));
        
    }

    public function prisonersListing()
    {
        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }

        $context = [
            'title' => "Prisoners",
            'collection' => Prisoner::all(),
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.prisoner.listing', $context);
    }

    public function showPrisoner($id)
    {
        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }
        $context = [
            'title' => "Prisoners",
            'collection' => Prisoner::find($id, 'p_id')->get(),
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.prisoner.profile', $context);
    }

    public function transferRequests($status)
    {
        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }
        $columns = "prisoners.p_id, transfers.id as transfer_id, prisoners.fname, prisoners.lname";
        $transfers = Transfer::join('prisoners', 'transfers.prisoner_id', 'prisoners.p_id');
        if($status !== 'all')
        {
            $transfers = $transfers->where('transfers.transfer_status', $status);
        }
        $context = [
            'title' => "Transfer Requests",
            'collection' => $transfers->get($columns),
            'level' => strtoupper($status),
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        
        return render('inmate.admin.prisoner.transfers', $context);
    }

    public function transferRequestDetails($id)
    {

        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }
        $columns = 'prisoners.fname, prisoners.lname, prisoners.gender, prisoners.p_id,
        prisoners.facility, prisoners.rehub, prisoners.cell_no, prisoners.date_joined,
        prisoners.release_date, prisoners.transfered_from, prisoners.dob, prisoners.crime,
        transfers.id as t_id, transfer_to, transfer_status, reason, 
        users.first_name, users.last_name, users.email, users.phone_number';
        $transfers = Transfer::join('prisoners', 'transfers.prisoner_id', 'prisoners.p_id')
        ->join('users', 'transfers.user_id', 'users.username');
        $transfers = $transfers->where('transfers.id', $id)->get($columns);
        $context = [
            'title' => "Transfer Request",
            'collection' => $transfers[0],
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.prisoner.transfer_request', $context);
    }


    public function transferRequestsActions(Request $request)
    {
        $id = $request->body->id;
        $action = $request->body->action;
        $p_id = $request->body->p_id;
        switch($action)
        {
            case 'approve': 
                $updated = Transfer::find($id)->update(['transfer_status' => 'approved']);
                $message = "Transfer request for ({$p_id}) has been approved successfully";
                break;
             case 'deny': 
                $updated = Transfer::find($id)->update(['transfer_status' => 'denied']);
                $message = "Transfer request for ({$p_id}) has been denied successfully";
                break;
        }

        if(!$updated)
        {
            return response()->send(202, alert()->failure("Failed to $action the transfer request. Please try again"));
        }
        $notification = [
            'sent_to' => $_SESSION['user']->username,
            'notification' => $message
        ];
        $notification = new Notification($notification);
        $notification->save();
        return response()->send(200, alert()->success($message));
    }

    public function registerAdminUsers()
    {

        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }
        $context = [
            'title' => "Admin User Registration",
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];
        return render('inmate.admin.users.add_new', $context); 
    }

    public function createAdminUserAccount(Request $request)
    {
        return Home::addUser($request);
    }

    public function userListing()
    {

        if(!AuthController::isLoggedIn('admin'))
        {
            return redirect();
        }
        $context = [
            'title' => 'Users Listing',
            'collection' => User::all(),
            'is_admin' => $_SESSION['admin']->account_type == 'admin' ? true : false,
            'name' => $_SESSION['admin']->first_name . " " . $_SESSION['admin']->last_name
        ];

        return render('inmate.admin.users.listing', $context);
    }
 }