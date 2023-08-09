<?php

namespace App\Http\Controllers\ComorbidityManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ComorbidityController extends Controller
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
        //
        try {
            // $healthData = DB::table('')
            return view('dashboard.comorbiditymanagement.comorbidity.list');
        } catch (\Throwable $th) {
            // An exception occurred, handle it
            dd($th->getmessage());
        }
    }
    public function getcomorbidity()
    {
        try {
            $comorbidityList = DB::table('comorbidity')
            // ->orderBy('created_at', 'asc')
                ->get();
            return response()->json(['success' => true, 'data' => $comorbidityList]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'An error occurred while fetching comorbidity list.']);
        }
    }

    public function addComorbidity(Request $request)
    {

        try {
            //code...
            // Validate the incoming request data
            $request->validate([
                'comorbidity' => 'required|string|max:255',
                'description' => 'required|string|max:255', //
            ]);

            $comorbidityData = [
                'name' => $request->input('comorbidity'),
                'description' => $request->input('description'),
                'created_at' => $this->getCurrentDateAsiaManila(),
            ];

            // Save the user to the database using DB::table('users')->insert()
            $userId = DB::table('comorbidity')->insert($comorbidityData);
            return response()->json(['success' => true, 'message' => 'Comorbidity added successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }

    }
    public function deleteComorbidity(Request $request)
    {
        //
        try {
            //code...
            DB::table('comorbidity')->where('id', $request->input('comorbidityID'))->delete();
            return response()->json(['success' => true, 'message' => 'Comorbidity deleted successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }

    public function updateComorbidity(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'comorbidity' => 'required|string|max:255',
                'description' => 'required|string|max:255', //
            ]);
            $comorbidityID = $request->input('comorbidityId');
            // Get the Comorbidity data from the database
            $comorbidityData = DB::table('comorbidity')->where('id', $comorbidityID)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$comorbidityData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'Comorbidity not found']);
            }

            // Update the user data based on the changes from the request
            $comorbidityDataToUpdate = [
                'name' => $request->input('comorbidity'),
                'description' => $request->input('description'),
                'updated_at' => $this->getCurrentDateAsiaManila(),
            ];
            DB::table('comorbidity')->where('id', $comorbidityID)->update($comorbidityDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'Comorbidity updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

}
