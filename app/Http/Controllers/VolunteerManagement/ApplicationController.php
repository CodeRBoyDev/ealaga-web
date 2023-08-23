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

        $volunteers = DB::table('volunteer')
        ->where('num_volunteers_needed', '>', 0)
        ->get();
        
        return view('dashboard.volunteermanagement.application.list', compact('volunteers'));

        } catch (\Exception $e) {
        return "Unable to connect to the database: " . $e->getMessage();
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

            // Now, update the num_volunteers_needed in the volunteer table
            $volunteerID = $applicationData->volunteer_id;
            $volunteerData = DB::table('volunteer')->where('id', $volunteerID)->first();
            
            if ($volunteerData) {
                $newNumVolunteersNeeded = max(0, $volunteerData->num_volunteers_needed - 1);
                DB::table('volunteer')->where('id', $volunteerID)->update(['num_volunteers_needed' => $newNumVolunteersNeeded]);
            }

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

    public function checkInApplication(Request $request)
    {
        try {
            $applicationID = $request->input('applicationID');
            $attended = 1;

            $applicationData = DB::table('params_volunteer_application')->where('id', $applicationID)->first();

            if (!$applicationData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'Application not found']);
            }

            // Update the application data based on the changes from the request
            $applicationDataToUpdate = [
                'is_attended' => $attended,
            ];
            DB::table('params_volunteer_application')->where('id', $applicationID)->update($applicationDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'Client attended']);
            
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function searchUser(Request $request)
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

    public function addApplication(Request $request)
    {

        try {
            $status = 0;

            $request->validate([
                'user_id' => 'required',
                'volunteer_id' => 'required',
            ]);

            $applicationData = [
                'user_id' => $request->input('user_id'),
                'volunteer_id' => $request->input('volunteer_id'),
                'status' => $status,
                'created_at' => $this->getCurrentDateAsiaManila(),
            ];

            // Save the user to the database using DB::table('users')->insert()
            DB::table('params_volunteer_application')->insert($applicationData);
            return response()->json(['success' => true, 'message' => 'Application added successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }

    }
}
