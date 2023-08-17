<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;

class ScheduleController extends Controller
{

    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }

    public function schedule()
    {
        //
        try {
           
            // Get the current date and time
            $currentDate = Carbon::now('Asia/Manila');

            $services = DB::table('services')->get();

            $schedule = DB::table('schedule')
            ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            ->leftjoin('users', 'users.id', '=', 'schedule.user_id')
            // ->where('schedule.schedule_date', '>=', $currentDate->format('Y-m-d'))
            // ->where('schedule.status', '<>', 3)
            // ->where('schedule.user_id', auth()->user()->id)
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, 
            schedule.schedule_date, schedule.schedule_time, schedule.status, users.firstname, users.lastname,
            users.barangay')
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status'
            , 'users.firstname', 'users.lastname', 'users.barangay')
            ->groupBy('schedule.id')
            ->get();

            if (request()->ajax()) {
                return response()->json(['schedule' => $schedule,]);
            } else {
                return view('dashboard.schedule.schedule', compact('services'));
            }


       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }


    public function scheduleView(Request $request, $id)
    {
        //
        try {
           
            // $services = DB::table('services')->get();
        
            $currentDate = Carbon::now('Asia/Manila');

            // $data = $request->all();
            $schedule = DB::table('schedule')
            ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            ->leftjoin('users', 'users.id', '=', 'schedule.user_id')
            // ->where('schedule.schedule_date', '>=', $currentDate->format('Y-m-d'))
            // ->where('schedule.status', '<>', 3)
            // ->where('schedule.user_id', auth()->user()->id)
            ->where('schedule.id', $id)
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, 
            schedule.schedule_date, schedule.schedule_time, schedule.status, users.firstname, users.lastname,
            users.barangay, users.email, schedule.processed_date, schedule.processed_by, schedule.qr_code'
            )
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status',
            'users.firstname', 'users.lastname', 'users.barangay', 'users.email', 'schedule.processed_date',
            'schedule.processed_by', 'schedule.qr_code')
            ->groupBy('schedule.id')
            ->first();

            $processed_by = DB::table('users')
            ->where('users.id', '=', $schedule->processed_by)
            ->selectRaw('users.lastname,
            users.firstname'
            )
            ->groupBy('users.lastname', 'users.firstname')
            ->groupBy('users.id')
            ->first();
            
        
                return response()->json(['schedule' => $schedule, 'processed_by' => $processed_by]);
      
       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function scheduleQRscanner()
    {
        //
        try {
           
           
            if (request()->ajax()) {
                return response()->json(['schedule' => "hiii",]);
            } else {
                return view('dashboard.schedule.qrscanner');
            }

      
       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function scheduleAccept(Request $request, $id)
    {
        //
        try {
           
            // $services = DB::table('services')->get();
        
            $currentDate = Carbon::now('Asia/Manila');
            $schedule_checker = DB::table('schedule')
                        ->where('schedule.id', $id)
                        ->select('schedule.schedule_date','schedule.status')
                        ->first();

            if($schedule_checker){
                if($currentDate->format('Y-m-d') ==  date('Y-m-d', strtotime($schedule_checker->schedule_date))){

                 
                        if($schedule_checker->status == 1 ){
                            return response()->json(['result' => 'attended']);
                        }elseif($schedule_checker->status == 2){
                            return response()->json(['result' => 'not_attended']);
                        }elseif($schedule_checker->status == 3){
                            return response()->json(['result' => 'cancelled']);
                        }else{
                            return response()->json(['result' => 'pending']);
                        }


                }else{
                    return response()->json(['result' => 'not_today']);

                }
            }
            else{
                return response()->json(['result' => 'not_found']);

            }
            // DB::table('schedule')
            // ->where('id', $id)
            // ->update([
            //     'status' => 1,
            //     'processed_by' => auth()->user()->id,
            //     'processed_date' => $this->getCurrentDateAsiaManila(),
            // ]);


            // // $data = $request->all();
            // $schedule = DB::table('schedule')
            // ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            // ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            // ->leftjoin('users', 'users.id', '=', 'schedule.user_id')
            // // ->where('schedule.schedule_date', '>=', $currentDate->format('Y-m-d'))
            // // ->where('schedule.status', '<>', 3)
            // // ->where('schedule.user_id', auth()->user()->id)
            // ->where('schedule.id', $id)
            // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, 
            // schedule.schedule_date, schedule.schedule_time, schedule.status, users.firstname, users.lastname,
            // users.barangay, users.email, schedule.processed_date, schedule.processed_by, schedule.qr_code'
            // )
            // ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status',
            // 'users.firstname', 'users.lastname', 'users.barangay', 'users.email', 'schedule.processed_date',
            // 'schedule.processed_by', 'schedule.qr_code')
            // ->groupBy('schedule.id')
            // ->first();

            // $processed_by = DB::table('users')
            // ->where('users.id', '=', $schedule->processed_by)
            // ->selectRaw('users.lastname,
            // users.firstname'
            // )
            // ->groupBy('users.lastname', 'users.firstname')
            // ->groupBy('users.id')
            // ->first();

        
                // return response()->json(['schedule' => $schedule, 'processed_by' => $processed_by]);
      
       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }


    public function scheduleSearch(Request $request)
    {
        //
        try {
           
            $full_name = $request->input('full_name');
            
            $list_filter_user = DB::table('users')
            ->whereRaw("CONCAT(firstname, ' ', lastname) LIKE '%$full_name%'")
            ->where('role', 2)
            ->select(
                            'users.id',
                            'users.firstname',
                            'users.lastname',
                            'users.barangay',
                            'users.img_path',
                        )
                        ->get();

            return response()->json($list_filter_user);
            

       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }






    //client ==================================================================================================================


    public function ClientSchedule(Request $request)
    {
        //
        try {
           
            $data = $request->all();
            
            if(isset($data['user_id'])) {
                $user_id = $data['user_id'];
            } else {
                $user_id = auth()->user()->id;
            }

            
            // Get the current date and time
            $currentDate = Carbon::now('Asia/Manila');

            $services = DB::table('services')->get();

            $scheduleTotals = DB::table('schedule')
            ->select('schedule_date', 'schedule_time', DB::raw('COUNT(*) as total'))
            ->whereDate('schedule_date', '>=', $currentDate->format('Y-m-d'))
            ->groupBy('schedule_date', 'schedule_time')
            ->get()
            ->toArray();

            $selected_disable_dates = DB::table('schedule')
            ->where('schedule.user_id', $user_id)
            ->where('schedule.status', '<>', 3)
            ->pluck('schedule_date')
            ->toArray();

            if (request()->ajax()) {
                return response()->json(['services' => $services, 'schedule_total' => $scheduleTotals, 'selected_date_disable' => $selected_disable_dates]);
            } else {
                return view('client.schedule', compact('services'));
            }


       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function ClientScheduleAdd(Request $request)
    {
        try {
            // dd("ho\i");
            $data = $request->all();

            $service_id_array = explode(",", $data['service_id']);

            // $user_auth_id = auth()->user()->id;
            if(isset($data['user_id'])) {
                $user_id = $data['user_id'];
            } else {
                $user_id = auth()->user()->id;
            }


            $scheduleID = DB::table('schedule')->insertGetId([
                'user_id' => $user_id ?? null,
                'schedule_date' => $data['schedule_date'] ?? null,
                'status' => 0,
                'schedule_time' => $data['schedule_time'] ?? null,
                'createdAt' => $this->getCurrentDateAsiaManila(),
            ]);

            foreach ($service_id_array as $service_id) {
                DB::table('param_schedule_services')->insert([
                    'schedule_id' => $scheduleID,
                    'service_id' => $service_id,
                ]);
            }

            $qrCodeData = [
                'user_id' => $user_id ?? null,
                'schedule_id' => $scheduleID ?? null,
                'services' => $service_id_array ?? null,
                'schedule_date' => $data['schedule_date'] ?? null,
                'status' => 0,
                'schedule_time' => $data['schedule_time'] ?? null,
            ];

            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($qrCodeData));

            // Create the directory if it doesn't exist
            $qrCodeDirectory = storage_path('app/public/scheduleqrCode/');
            File::makeDirectory($qrCodeDirectory, $mode = 0777, true, true);

            // Save the QR code image to the storage/app/public/qrcode directory
            $qrCodePath = $qrCodeDirectory . $scheduleID . '.svg';
            file_put_contents($qrCodePath, $qrCode);

            // Update the user record with the QR code path in the database
            DB::table('schedule')->where('id', $scheduleID)->update(['qr_code' => "storage/scheduleqrCode/" . $scheduleID . '.svg']);

            // Log::debug('Data received from AJAX call:', $data);

            // return response()->json(['message' => "successfully added!"]);
            return response()->json(['message' => json_encode($service_id_array)]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }


    public function ClientScheduleSlot(Request $request)
    {
        //
        try {
           
            // $services = DB::table('services')->get();
        
            $data = $request->all();
            $schedule = DB::table('schedule')
            ->where('schedule.status', '<>', 3)
            ->where('schedule_date', $data['date'])
            ->where('schedule_time', $data['time'])
            ->get();

            return response()->json(['schedule' => $schedule]);



       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function ClientScheduleList(Request $request)
    {
        //
        try {
           
            $currentDate = Carbon::now('Asia/Manila');
            // $services = DB::table('services')->get();
        
            // $data = $request->all();
            $schedule = DB::table('schedule')
            ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            ->where('schedule.schedule_date', '>=', $currentDate->format('Y-m-d'))
            ->where('schedule.status', '<>', 3)
            ->where('schedule.user_id', auth()->user()->id)
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status')
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status')
            ->groupBy('schedule.id')
            ->get();
        


                                // $userEmail = "rickydonadillo02@gmail.com";
                                // $subject = 'Leaves Reminder';
                                // $userData = [
                                // 'receiver_name' => "test",
                                // 'body' => "test",
                                // 'sender_name' => "test",
                                // 'sender_position' => "Test",
                                // ];

                                // Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));



            if (request()->ajax()) {
                return response()->json(['schedule' => $schedule]);

            } else {
                return view('client.schedule_list', compact('schedule'));
            }




       } catch (\Exception $e) {
           return "error: " . $e->getMessage();
       }
    }


    public function ClientScheduleHistory(Request $request)
    {
        //
        try {
           
            // $services = DB::table('services')->get();
        
            $currentDate = Carbon::now('Asia/Manila');

            // $data = $request->all();
            $schedule = DB::table('schedule')
            ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            ->leftjoin('reviews', 'reviews.schedule_id', '=', 'schedule.id')
            ->where('schedule.user_id', auth()->user()->id)
        // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services')
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status, reviews.rate')
            ->where('schedule.schedule_date', '<', $currentDate->format('Y-m-d'))
            ->orWhere('schedule.status', 3)
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status', 'reviews.rate')
            ->groupBy('schedule.id')
            ->get();
        

            if (request()->ajax()) {
                return response()->json(['schedule' => $schedule]);

            } else {
                return view('client.schedule_history', compact('schedule'));
            }




       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function ClientScheduleView(Request $request, $id)
    {
        //
        try {
           
            // $services = DB::table('services')->get();
        
            $currentDate = Carbon::now('Asia/Manila');

            // $data = $request->all();
            $schedule = DB::table('schedule')
            ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
            ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
            // ->where('schedule.user_id', $userId)
        // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services')
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.qr_code, schedule.schedule_time, schedule.status')
          
            // ->where('schedule.schedule_date', '<', $currentDate->format('Y-m-d'))
            ->where('schedule.id', $id)
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status', 'schedule.qr_code')
            ->groupBy('schedule.id')
            ->first();
        
                return response()->json(['schedule' => $schedule]);
      
       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }

    public function ClientScheduleCancel(Request $request, $id)
    {
        //
        try {
           
            DB::table('schedule')
                ->where('id', $id)
                ->update([
                    'status' => 3,
                ]);

            return response()->json(['status' =>  $id]);
      
       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }


    public function ClientScheduleReview(Request $request)
    {
        try {
            // dd("ho\i");
            $data = $request->all();

            $user_auth_id = auth()->user()->id;

            $scheduleID = DB::table('reviews')->insert([
                'user_id' => $user_auth_id ?? null,
                'schedule_id' => $data['schedule_id'] ?? null,
                'rate' => $data['rate'] ?? null,
                'comment' => $data['comment'] ?? null,
                'createdAt' => $this->getCurrentDateAsiaManila(),
            ]);

            return response()->json(['message' => "success"]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
