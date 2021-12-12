<?php 
 namespace App\Controller;

use App\Controller\Admin\AuthController;
use App\Controller\BaseController;
use App\Models\Notification;
use App\Models\Transfer;
use System\Http\Request\Request;

class TransferController extends BaseController 
 { 

    public function request(Request $request)
    {
        $family_member = $request->post('user_id');
        $prisoner_id = $request->post('prionser_id');
        $reason = $request->post('reason');
        $transfer_to = $request->post('transfer_to');
        $transfer = [
            'user_id' => $family_member,
            'prisoner_id' => $prisoner_id,
            'reason' => $reason,
            'transfer_to' => $transfer_to
        ];

        $transfer = new Transfer($transfer);
        $notification = "Transfer request for ($prisoner_id) has been sent and received successfully";
        if(!$transfer->save())
        {
            return response()->send(202, alert()->danger('Transfer request to sent! Please try again later'));
        }
        $notify = [
            'sent_to' => $family_member,
            'notification' => $notification
        ];
        $notification = new Notification($notify);
        $notification->save();
        return response()->send(200, alert()->success("Transfer request sent successfully and awaits aproval"));
    }

    public function requestHistory($status)
    {

        if(!AuthController::isLoggedIn())
        {
            
            return redirect('');
        }

        $user = $_SESSION['user'];
        $transfer = Transfer::where('user_id', $user->username);
        if($status !== 'Transfers')
        {
            $transfer = $transfer->where('transfer_status', $status);
        }

        $transfer = $transfer->get();

        $context = [
            'title' => "Imate Dashboard",
            'user' => $user,
            'notifications' => Notification::where('sent_to', $user->username)->where('is_read', 0)->get(),
            'transfer' => $transfer
        ];

        return render('inmate.transfers.listing', $context);

    }
 }