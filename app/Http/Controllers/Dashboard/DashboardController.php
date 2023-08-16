<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            //code...
            $totalUsers = DB::table('users')->count();
            $currentDate = $this->getCurrentDateAsiaManila();
            // Convert the date to the desired format
            $formattedDate = date('Y-m-d', strtotime($currentDate));
            $totalSchedules = DB::table('schedule')
                ->where('status', 0)
                ->where('schedule_date', $formattedDate)
                ->count();

            $totalVolunteer = DB::table('params_volunteer_application')
                ->where('status', 0)
                ->count();
            $totalReview = DB::table('reviews')->avg('rate');
            $totalServices = DB::table('param_schedule_services')->count();
            $servicesList = DB::table('services')
                ->select('title as service', 'id as serviceID')
                ->get();
            $OverallSchedules = DB::table('schedule')->count();

            $formattedAverageRate = number_format($totalReview, 2);

            $reviews = DB::table('users')
                ->join('reviews', 'reviews.user_id', 'users.id')
                ->select('users.img_path', 'users.email', 'users.firstname', 'users.lastname', 'users.role', 'reviews.*')
                ->get();

            if (Auth::check()) {
                // User is not authenticated, display the login view
                return view('dashboard.dashboard', [
                    "totalUsers" => $totalUsers,
                    "totalSchedules" => $totalSchedules,
                    "totalVolunteer" => $totalVolunteer,
                    "totalReview" => $formattedAverageRate,
                    "totalServices" => $totalServices,
                    "servicesList" => $servicesList,
                    "OverallSchedules" => $OverallSchedules,
                    "reviews" => $reviews,
                ]);
            }

            return redirect()->route('login');

        } catch (\Throwable $th) {
            //throw $th;
            dd("Error:", $th->getmessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
