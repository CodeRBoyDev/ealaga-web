<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    //
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    public function userView($userId)
    {
        try {
            //code...

            $userData = DB::table('users')->where('id', $userId)->first();
            $scheduleData = DB::table('schedule')
                ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
                ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
                ->where('schedule.user_id', $userId)
            // ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services')
                ->selectRaw('schedule.id as schedule_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status,schedule.qr_code,schedule.createdAt')
                ->groupBy('schedule.id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status', 'schedule.qr_code', 'schedule.createdAt')
                ->groupBy('schedule.id')
                ->orderBy('schedule.schedule_date')
                ->get();
            $servicesData = DB::table('services')
                ->select('id as service_id', 'title as service')
                ->get();
            $comorbidityList = DB::table('comorbidity')
                ->select('id', 'name as comorbidity', 'description')
                ->get();

            $userComorbidity = DB::table('param_users_comorbidity')
                ->where('user_id', $userId)
                ->select('comorbidity_id')
                ->get();
            return view('dashboard.usermanagement.users.view',
                ['userData' => $userData,
                    'scheduleData' => $scheduleData,
                    'servicesData' => $servicesData,
                    'comorbidityList' => $comorbidityList,
                    'userComorbidity' => $userComorbidity,
                ]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getmessage());
        }
    }

    public function isActive(Request $request, $userId)
    {
        try {
            //code...
            // Update the user data based on the changes from the request
            $userDataToUpdate = [
                'is_active' => $request->input('is_active'),
                'updated_at' => $this->getCurrentDateAsiaManila(),
            ];
            DB::table('users')->where('id', $userId)->update($userDataToUpdate);
            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }

    }

    public function UpdateComorbidity(Request $request, $userId)
    {
        try {
            $formData = $request->all();
            $comorbidityArray = $formData['comorbidity']; // Get the array of comorbidity IDs
            DB::table('param_users_comorbidity')->where('user_id', $userId)->delete();

            foreach ($comorbidityArray as $comorbidityID) {
                DB::table('param_users_comorbidity')->insert([
                    "user_id" => $userId,
                    "comorbidity_id" => $comorbidityID,
                ]);
            }

            return response()->json(['success' => true, 'message' => 'User comorbidities updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

}
