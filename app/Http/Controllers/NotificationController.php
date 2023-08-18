<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\Mail\EmailNotification;
use App\Mail\ErrorEmailNotification;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{

    public function notificationList()
    {
       
        try {
            $notifications = DB::table('notification')
            ->where('user_id', auth()->user()->id)
            ->orderBy('timestamp', 'desc')
            ->get();

            $notificationsTotal = DB::table('notification')
            ->where('user_id', auth()->user()->id)
            ->where('is_read', 0)
            ->get();

            if (request()->ajax()) {
                return response()->json(['notifications' => $notifications, 'notificationsTotal' => $notificationsTotal]);
            }

    
        } catch (\Exception $e) {
        


            die('error: ' . $e->getMessage());

        }
        
        }


        public function NotificationUpdate($id)
        {
           
            try {

                DB::table('notification')
                ->where('id', $id) 
                ->update([
                    'is_read' => 1,
                ]);

                $notification = DB::table('notification')
                ->where('id', $id)
                ->first();
    
                return response()->json(['notification' => $notification]);

            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }
            
            }



}