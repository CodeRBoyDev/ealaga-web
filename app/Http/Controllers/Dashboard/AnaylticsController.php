<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AnaylticsController extends Controller
{
    //
    public function getUserStatistics(Request $request)
    {
        try {
            $selectedOption = $request->input('selectedOption');
            $userTable = 'users'; // Specify the table name

            $userData = null;
            $message = '';

            switch ($selectedOption) {
                case 'gender':
                    $userData = DB::table($userTable)
                        ->select('gender as label', DB::raw('count(*) as value'))
                        ->groupBy('gender')
                        ->get();
                    $message = 'Gender';
                    break;
                case 'age':
                    $userData = DB::table($userTable)
                        ->select('age as label', DB::raw('count(*) as value'))
                        ->groupBy('age')
                        ->whereNotNull('age') // Filter out null values
                        ->get();
                    $message = 'Age';
                    break;
                case 'barangay':
                    $userData = DB::table($userTable)
                        ->select('barangay as label', DB::raw('count(*) as value'))
                        ->groupBy('barangay')
                        ->whereNotNull('barangay') // Filter out null values
                        ->get();
                    $message = 'Barangay';
                    break;
                default:
                    // Handle default case
                    $message = 'Invalid option';
                case 'role':
                    $userData = DB::table($userTable)
                        ->select(DB::raw('CASE
                                    WHEN role = 0 THEN "Admin"
                                    WHEN role = 1 THEN "Personnel"
                                    WHEN role = 2 THEN "Client"
                                    ELSE "Other" END AS label'),
                            DB::raw('count(*) as value'))
                        ->groupBy('role')
                        ->get();
                    $message = 'Role';
                    break;
                case 'status':
                    $userData = DB::table($userTable)
                        ->select(DB::raw('CASE
                                    WHEN status = 0 THEN "Pending"
                                    WHEN status = 1 THEN "Verified"
                                    ELSE "Not Verified" END AS label'),
                            DB::raw('count(*) as value'))
                        ->groupBy('status')
                        ->get();
                    $message = 'Status';
                    break;
            }

            return response()->json(['success' => true, 'message' => $message, 'data' => $userData]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error fetching statistics', 'data' => $th->getMessage()]);
        }
    }
    public function getServicesStatistics(Request $request)
    {
        try {

            $servicesData = DB::table('services')
                ->leftjoin('param_schedule_services', 'param_schedule_services.service_id', "services.id")
                ->select('services.title as label', DB::raw('count(*) as value'))
                ->groupBy('services.title')
                ->get();

            return response()->json(['success' => true, 'message' => "Fecthing statistics successfully ", 'data' => $servicesData]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error fetching statistics', 'data' => $th->getMessage()]);
        }
    }

    public function getSchedulesStatistics(Request $request)
    {
        try {
            $from = $request->input('date_from', null);
            $to = $request->input('date_to', null);
            $status = $request->has('schedules_status') ? intval($request->input('schedules_status')) : null;
            $message = '';
            $query = DB::table('schedule');

            if ($status && $status === 4) {
                # code...
                $query->where('status', 0);
                $groupBy = ['schedule_date', 'status']; // Group by both schedule_date and status
                $selectRaw = 'schedule_date, status, COUNT(*) as count'; // Include status in selectRaw
                $message = 'Pending';

            } else if ($status && $status > 0) {
                $query->where('status', $status);
                $groupBy = ['schedule_date', 'status']; // Group by both schedule_date and status
                $selectRaw = 'schedule_date, status, COUNT(*) as count'; // Include status in selectRaw
                $message = $status === 1 ? "Attended" : ($status === 2 ? "Not Attended" : "Cancelled");

            } else {
                $groupBy = ['schedule_date']; // Group by only schedule_date
                $selectRaw = 'schedule_date, COUNT(*) as count';
                $message = "All Status";
            }

            if ($from && $to) {
                $query->whereBetween('schedule_date', [$from, $to]);
            } elseif ($from) {
                $query->where('schedule_date', '>=', $from);
            } elseif ($to) {
                $query->where('schedule_date', '<=', $to);
            }

            $data = $query->groupBy($groupBy)
                ->selectRaw($selectRaw)
                ->get();

            return response()->json(['success' => true, 'message' => $message, 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error fetching statistics', 'data' => $th->getMessage()]);
        }
    }
    public function getTopList(Request $request)
    {
        try {
            //code...

            $menu = $request->input('menu');
            if ($menu && $menu === "Client") {
                # code...
                $table = DB::table('users');
                $topList = $table
                    ->join('schedule', 'schedule.user_id', '=', 'users.id') // Corrected join condition
                    ->select(DB::raw('CONCAT(users.firstname, " ", users.lastname) AS label'), DB::raw('count(*) as value')) // Concatenate first name and last name
                    ->groupBy('label')
                    ->orderBy('value', 'desc') // Order by value in descending order
                    ->take(10) // Limit the results to top 10
                    ->get();
            } elseif ($menu && $menu === "Barangay") {
                # code...
                $table = DB::table('users');
                $topList = $table
                    ->join('schedule', 'schedule.user_id', "users.id")
                    ->select('users.barangay as label', DB::raw('count(*) as value'))
                    ->groupBy('users.barangay')
                    ->orderBy('value', 'desc') // Order by value in descending order
                    ->take(10) // Limit the results to top 10
                    ->get();

            } else {
                $table = DB::table('services');
                $topList = $table
                    ->leftjoin('param_schedule_services', 'param_schedule_services.service_id', "services.id")
                    ->select('services.title as label', DB::raw('count(*) as value'))
                    ->groupBy('services.title')
                    ->orderBy('value', 'desc') // Order by value in descending order
                    ->take(10) // Limit the results to top 10
                    ->get();
            }

            return response()->json(['success' => true, 'data' => $topList]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'data' => $th->getMessage()]);
        }
    }
    public function getComorbidityStatisticxs()
    {
        try {

            $comorbidityData = DB::table('comorbidity')
                ->join('param_users_comorbidity', 'param_users_comorbidity.comorbidity_id', "comorbidity.id")
                ->select('comorbidity.name as label', DB::raw('count(*) as value'))
                ->groupBy('comorbidity.name')
                ->get();

            return response()->json(['success' => true, 'message' => "Fecthing statistics successfully ", 'data' => $comorbidityData]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error fetching statistics', 'data' => $th->getMessage()]);
        }

    }

}
