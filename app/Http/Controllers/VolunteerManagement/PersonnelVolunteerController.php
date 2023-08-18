<?php

namespace App\Http\Controllers\VolunteerManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use DateTime;
use Auth;

class PersonnelVolunteerController extends Controller
{
    //
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    public function index()
    {
        try {
            return view('dashboard.volunteermanagement.volunteer.list');
        } catch (\Throwable $th) {
            dd($th->getmessage());
        }
    }
    
    public function getVolunteer()
    {
        try {
            $volunteerList = DB::table('volunteer')
            ->get();

            return response()->json(['success' => true, 'data' => $volunteerList]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'An error occurred while fetching volunteer list.']);
        }
    }

    public function addVolunteer(Request $request)
    {

        try {
            $personnel_id = auth()->user()->id;
            $request->merge([
                'time' => (new DateTime($request->time))->format('H:i:s')
            ]);

            $request->validate([
                'title' => 'required|string|max:45',
                'description' => 'required|string|max:255', 
                'date' => 'required|date_format:Y-m-d',
                'time' => 'required|date_format:H:i:s',
                'skill' => 'nullable|string|max:45',
                'vacant' => 'required|integer',
            ]);

            $volunteerData = [
                'personnel_id' => $personnel_id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'scheduled_date' => $request->input('date'),
                'scheduled_time' => $request->input('time'),
                'required_skills' => $request->input('skill'),
                'num_volunteers_needed' => $request->input('vacant'),
                'created_at' => $this->getCurrentDateAsiaManila(),
            ];

            // Save the user to the database using DB::table('users')->insert()
            $userId = DB::table('volunteer')->insert($volunteerData);
            return response()->json(['success' => true, 'message' => 'Volunteer added successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }

    }

    public function updateVolunteer(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->merge([
                'time' => (new DateTime($request->time))->format('H:i:s')
            ]);

            $request->validate([
                'title' => 'required|string|max:45',
                'description' => 'required|string|max:255', 
                'date' => 'required|date_format:Y-m-d',
                'time' => 'required|date_format:H:i:s',
                'skill' => 'required|string|max:45',
                'vacant' => 'required|integer',
            ]);
            
            $volunteerID = $request->input('volunteerId');
            // Get the Volunteer data from the database
            $volunteerData = DB::table('volunteer')->where('id', $volunteerID)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$volunteerData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'Volunteer not found']);
            }

            // Update the volunteer data based on the changes from the request
            $volunteerDataToUpdate = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'scheduled_date' => $request->input('date'),
                'scheduled_time' => $request->input('time'),
                'required_skills' => $request->input('skill'),
                'num_volunteers_needed' => $request->input('vacant'),
                'updated_at' => $this->getCurrentDateAsiaManila(),
            ];
            DB::table('volunteer')->where('id', $volunteerID)->update($volunteerDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'Volunteer updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function deleteVolunteer(Request $request)
    {
        //
        try {
            //code...
            DB::table('volunteer')->where('id', $request->input('volunteerID'))->delete();
            return response()->json(['success' => true, 'message' => 'Volunteer deleted successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }
}
