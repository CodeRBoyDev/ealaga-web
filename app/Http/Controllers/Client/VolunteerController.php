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

    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }

    public function ClientVolunteerList(Request $request) 
    {
            try {
                $volunteers = DB::table('volunteer')
                ->where('num_volunteers_needed', '>', 0)
                ->get();

                $applications = DB::table('params_volunteer_application')
                ->select('params_volunteer_application.*', 'volunteer.title', 'volunteer.description', 'volunteer.num_volunteers_needed', 'volunteer.required_skills', 'volunteer.date')
                ->leftJoin('volunteer', 'volunteer.id', '=', 'params_volunteer_application.opportunity_id')
                ->where('params_volunteer_application.client_id', '=', 1)
                ->where('volunteer.date', '>=', $this->getCurrentDateAsiaManila())
                ->get();

                $histories = DB::table('volunteer')
                ->select('volunteer.*', 'params_volunteer_application.status', 'params_volunteer_application.isAttended')
                ->leftJoin('params_volunteer_application', 'params_volunteer_application.opportunity_id', '=', 'volunteer.id')
                ->where('params_volunteer_application.status', '=', 1)
                ->where('volunteer.date', '<', $this->getCurrentDateAsiaManila())
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
            $client_id = 1;
            $opportunity_id = $request->input('opportunity_id');
            $status = 0;
            $currentLocalDateTime = Carbon::now();

            // Insert the application into the database
            DB::table('params_volunteer_application')->insert([
                'client_id' => $client_id,
                'opportunity_id' => $opportunity_id,
                'status' => $status,
                'createdAt' => $this->getCurrentDateAsiaManila(),
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
