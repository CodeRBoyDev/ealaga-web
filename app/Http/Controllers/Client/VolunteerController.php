<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class VolunteerController extends Controller
{

    public function ClientVolunteerList(Request $request)
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
                return view('client.volunteer', compact('schedule'));
            }




       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }


}
