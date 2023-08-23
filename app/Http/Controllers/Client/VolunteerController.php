<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Auth;

class VolunteerController extends Controller
{

    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }

    public function ClientVolunteerList(Request $request) 
    {
            try {
                $user_id = auth()->user()->id;

                $volunteers = DB::table('volunteer')
                ->where('num_volunteers_needed', '>', 0)
                ->where('volunteer.scheduled_date', '>=', $this->getCurrentDateAsiaManila())
                ->get();

                $applications = DB::table('params_volunteer_application')
                ->select('params_volunteer_application.*', 'volunteer.title', 'volunteer.description', 'volunteer.num_volunteers_needed', 'volunteer.required_skills', 'volunteer.scheduled_date', 'volunteer.scheduled_time')
                ->leftJoin('volunteer', 'volunteer.id', '=', 'params_volunteer_application.volunteer_id')
                ->where('params_volunteer_application.user_id', '=', $user_id)
                ->where('volunteer.scheduled_date', '>=', $this->getCurrentDateAsiaManila())
                ->get();

                $histories = DB::table('volunteer')
                ->select('volunteer.*', 'params_volunteer_application.status', 'params_volunteer_application.is_attended')
                ->leftJoin('params_volunteer_application', 'params_volunteer_application.volunteer_id', '=', 'volunteer.id')
                ->where('params_volunteer_application.status', '=', 1)
                ->where('volunteer.scheduled_date', '<', $this->getCurrentDateAsiaManila())
                ->get();
                
                if (request()->ajax()) {
                    return response()->json(['volunteer' => $volunteers, 'application' => $applications, 'history' => $histories]);
    
                }
                return view('client.volunteer', compact('volunteers','applications','histories'));

    
           } catch (\Exception $e) {
               return "Unable to connect to the database: " . $e->getMessage();
           }
    }

    public function ClientVolunteerSubmit(Request $request)
    {
        try {
            $user_id = auth()->user()->id;

            $volunteer_id = $request->input('volunteer_id');
            $status = 0;
            $currentLocalDateTime = Carbon::now();

            // Insert the application into the database
            DB::table('params_volunteer_application')->insert([
                'user_id' => $user_id,
                'volunteer_id' => $volunteer_id,
                'status' => $status,
                'created_at' => $this->getCurrentDateAsiaManila(),
                // Add other columns and their values as needed
            ]);

            return response()->json(['message' => 'Application submitted successfully']);

       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }

    }

    public function ClientVolunteerDelete(Request $request)
    {
        try {
            $id = $request->input('params_volunteer_application_id');
            DB::table('params_volunteer_application')->where('id', $id)->delete();
            
            return response()->json(['message' => 'Application deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete application: ' . $e->getMessage()], 500);
        }
    }
}
