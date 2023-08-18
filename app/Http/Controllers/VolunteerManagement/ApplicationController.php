<?php

namespace App\Http\Controllers\VolunteerManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ApplicationController extends Controller
{
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    public function index()
    {
        try {
            return view('dashboard.volunteermanagement.application.list');
        } catch (\Throwable $th) {
            dd($th->getmessage());
        }
    }

    public function getApplication()
    {
        try {
            $applicationList = DB::table('params_volunteer_application')
            ->select('params_volunteer_application.*', 'volunteer.title', 'volunteer.scheduled_date', 'volunteer.num_volunteers_needed', 'users.id AS users_id', 'users.firstname', 'users.middlename', 'users.lastname', 'users.suffix')
            ->leftJoin('volunteer', 'volunteer.id', '=', 'params_volunteer_application.volunteer_id')
            ->leftJoin('users', 'users.id', '=', 'params_volunteer_application.user_id')
            ->get();

            return response()->json(['success' => true, 'data' => $applicationList]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'An error occurred while fetching volunteer list.']);
        }
    }

    public function approveApplication(Request $request)
    {
        try {
            $applicationID = $request->input('applicationID');
            $approveStatus = 1;

            $applicationData = DB::table('params_volunteer_application')->where('id', $applicationID)->first();

            if (!$applicationData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'Application not found']);
            }

            // Update the application data based on the changes from the request
            $applicationDataToUpdate = [
                'status' => $approveStatus,
            ];
            DB::table('params_volunteer_application')->where('id', $applicationID)->update($applicationDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'Application updated successfully']);
            
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function denyApplication(Request $request)
    {
        try {
            $applicationID = $request->input('applicationID');
            $approveStatus = 2;

            $applicationData = DB::table('params_volunteer_application')->where('id', $applicationID)->first();

            if (!$applicationData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'Application not found']);
            }

            // Update the application data based on the changes from the request
            $applicationDataToUpdate = [
                'status' => $approveStatus,
            ];
            DB::table('params_volunteer_application')->where('id', $applicationID)->update($applicationDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'Application updated successfully']);
            
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
