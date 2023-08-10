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


    public function ClientSchedule()
    {
        //
        try {
           
            // Get the current date and time
            $currentDate = Carbon::now('Asia/Manila');

            $services = DB::table('services')->get();

            $scheduleTotals = DB::table('schedule')
            ->select('schedule_date', 'schedule_time', DB::raw('COUNT(*) as total'))
            ->whereDate('schedule_date', '>=', $currentDate->format('Y-m-d'))
            ->groupBy('schedule_date', 'schedule_time')
            ->get()
            ->toArray();

            if (request()->ajax()) {
                return response()->json(['services' => $services, 'schedule_total' => $scheduleTotals]);
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

            $employee_id = 1;

            $scheduleID = DB::table('schedule')->insertGetId([
                'user_id' => $employee_id ?? null,
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
                'user_id' => $employee_id ?? null,
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
            // ->where('schedule.user_id', $userId)
        // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services')
            ->where('schedule.schedule_date', '>=', $currentDate->format('Y-m-d'))
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status')
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status')
            ->groupBy('schedule.id')
            ->get();
        


                                $userEmail = "rickydonadillo02@gmail.com";
                                $subject = 'Leaves Reminder';
                                $userData = [
                                'receiver_name' => "test",
                                'body' => "test",
                                'sender_name' => "test",
                                'sender_position' => "Test",
                                ];

                                Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));



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
            // ->where('schedule.user_id', $userId)
        // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services')
            ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status')
            ->where('schedule.schedule_date', '<', $currentDate->format('Y-m-d'))
            ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status')
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

}