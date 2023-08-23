<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
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
            //code...
            return view('dashboard.reports.index');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getmessage());
        }
    }
    public function usersReport()
    {
        try {
            //code...

            $usersReport = DB::table('users')
                ->select(
                    'users.id as user_id',
                    'users.barangay',
                    'users.firstname',
                    'users.middlename',
                    'users.lastname',
                    'users.suffix',
                    DB::raw('count(distinct schedule.id) as total_schedules'),
                    DB::raw('coalesce(count(distinct param_users_comorbidity.comorbidity_id), 0) as total_comorbidities')
                )
                ->leftJoin('schedule', 'schedule.user_id', 'users.id')
                ->leftJoin('param_users_comorbidity', 'param_users_comorbidity.user_id', 'users.id')
                ->groupBy(
                    'users.id',
                    'users.barangay',
                    'users.firstname',
                    'users.middlename',
                    'users.lastname',
                    'users.suffix', )
                ->orderBy('users.lastname') // Order by lastname
                ->get();

            return response()->json(['success' => true, "data" => $usersReport]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, "data" => $th->getmessage()]);
        }
    }
    public function barangayReport()
    {
        try {
            //code...
            $barangayReport = DB::table('users')
                ->select(
                    'users.barangay',
                    DB::raw('count(distinct users.id) as total_users'),
                    DB::raw('count(distinct schedule.id) as total_schedules'),
                    DB::raw('coalesce(count(distinct param_users_comorbidity.comorbidity_id), 0) as total_comorbidities'),
                    DB::raw('coalesce(count(distinct params_volunteer_application.volunteer_id), 0) as total_volunteers')
                )
                ->leftJoin('schedule', 'schedule.user_id', 'users.id')
                ->leftJoin('param_users_comorbidity', 'param_users_comorbidity.user_id', 'users.id')
                ->leftJoin('params_volunteer_application', 'params_volunteer_application.user_id', 'users.id')
                ->groupBy('users.barangay')
                ->orderBy('users.barangay') // Order by barangay
                ->get();

            return response()->json(['success' => true, "data" => $barangayReport]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, "data" => $th->getmessage()]);
        }

    }
    public function servicesReport()
    {
        try {
            //code...
            $servicesData = DB::table('services')
                ->select(
                    'services.id as service_id',
                    'services.title',
                    DB::raw('count(distinct users.id) as total_users_per_service'),
                    DB::raw('sum(case when schedule.status = 0 then 1 else 0 end) as total_pending'),
                    DB::raw('sum(case when schedule.status = 1 then 1 else 0 end) as total_attended'),
                    DB::raw('sum(case when schedule.status = 2 then 1 else 0 end) as total_not_attended'),
                    DB::raw('sum(case when schedule.status = 3 then 1 else 0 end) as total_cancelled'),

                )
                ->leftJoin('param_schedule_services', 'param_schedule_services.service_id', 'services.id')
                ->leftJoin('schedule', 'schedule.id', 'param_schedule_services.schedule_id')
                ->leftJoin('users', 'users.id', 'schedule.user_id')
                ->groupBy('services.id', 'services.title')
                ->orderBy('services.title') // Order by title

                ->get();

            return response()->json(['success' => true, "data" => $servicesData]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, "data" => $th->getmessage()]);
        }

    }
    public function comorbiditiesReport()
    {
        try {
            //code...
            $comorbidityData = DB::table('comorbidity')
                ->select(
                    'comorbidity.id as comorbidity_id',
                    'comorbidity.name',
                    'comorbidity.description',

                    DB::raw('count(distinct users.id) as total_users_per_comorbidity')
                )
                ->join('param_users_comorbidity', 'param_users_comorbidity.comorbidity_id', 'comorbidity.id')
                ->leftJoin('users', 'users.id', 'param_users_comorbidity.user_id')
                ->groupBy('comorbidity.id', 'comorbidity.name', 'comorbidity.description')
                ->orderBy('comorbidity.name')
                ->get();
            return response()->json(['success' => true, "data" => $comorbidityData]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, "data" => $th->getmessage()]);
        }

    }

    public function generatePDF(Request $request)
    {
        try {
            //code...

            $genaratepdF = $request->input('selectedValue');
            $usersReport = DB::table('users')
                ->select(
                    'users.id as user_id',
                    'users.barangay',
                    'users.firstname',
                    'users.middlename',
                    'users.lastname',
                    'users.suffix',
                    DB::raw('count(distinct schedule.id) as total_schedules'),
                    DB::raw('coalesce(count(distinct param_users_comorbidity.comorbidity_id), 0) as total_comorbidities')
                )
                ->leftJoin('schedule', 'schedule.user_id', 'users.id')
                ->leftJoin('param_users_comorbidity', 'param_users_comorbidity.user_id', 'users.id')
                ->groupBy(
                    'users.id',
                    'users.barangay',
                    'users.firstname',
                    'users.middlename',
                    'users.lastname',
                    'users.suffix',
                )
                ->orderBy('users.lastname') // Order by lastname
                ->get();

            $barangayReport = DB::table('users')
                ->select(
                    'users.barangay',
                    DB::raw('count(distinct users.id) as total_users'),
                    DB::raw('count(distinct schedule.id) as total_schedules'),
                    DB::raw('coalesce(count(distinct param_users_comorbidity.comorbidity_id), 0) as total_comorbidities'),
                    DB::raw('coalesce(count(distinct params_volunteer_application.volunteer_id), 0) as total_volunteers')
                )
                ->leftJoin('schedule', 'schedule.user_id', 'users.id')
                ->leftJoin('param_users_comorbidity', 'param_users_comorbidity.user_id', 'users.id')
                ->leftJoin('params_volunteer_application', 'params_volunteer_application.user_id', 'users.id')
                ->groupBy('users.barangay')
                ->orderBy('users.barangay') // Order by barangay
                ->get();
            $servicesData = DB::table('services')
                ->select(
                    'services.id as service_id',
                    'services.title',
                    DB::raw('count(distinct users.id) as total_users_per_service'),
                    DB::raw('sum(case when schedule.status = 0 then 1 else 0 end) as total_pending'),
                    DB::raw('sum(case when schedule.status = 1 then 1 else 0 end) as total_attended'),
                    DB::raw('sum(case when schedule.status = 2 then 1 else 0 end) as total_not_attended'),
                    DB::raw('sum(case when schedule.status = 3 then 1 else 0 end) as total_cancelled'),
                )
                ->leftJoin('param_schedule_services', 'param_schedule_services.service_id', 'services.id')
                ->leftJoin('schedule', 'schedule.id', 'param_schedule_services.schedule_id')
                ->leftJoin('users', 'users.id', 'schedule.user_id')
                ->groupBy('services.id', 'services.title')
                ->orderBy('services.title') // Order by title

                ->get();
            $comorbidityData = DB::table('comorbidity')
                ->select(
                    'comorbidity.id as comorbidity_id',
                    'comorbidity.name',
                    'comorbidity.description',

                    DB::raw('count(distinct users.id) as total_users_per_comorbidity')
                )
                ->join('param_users_comorbidity', 'param_users_comorbidity.comorbidity_id', 'comorbidity.id')
                ->leftJoin('users', 'users.id', 'param_users_comorbidity.user_id')
                ->groupBy('comorbidity.id', 'comorbidity.name', 'comorbidity.description')
                ->orderBy('comorbidity.name')
                ->get();

            $imagePath = public_path('client/media/taguigbranding/OSCAJPG.png');
            $imageContent = file_get_contents($imagePath);
            $base64Image = 'data:image/png;base64,' . base64_encode($imageContent);

            $currentDate = $this->getCurrentDateAsiaManila();
            // Generate the full image URL using the asset function
            $pdfreport = '';
            if ($genaratepdF && $genaratepdF === "users") {
                # code...
                $pdf = PDF::loadView('dashboard.reports.report-pdf',
                    [
                        'usersReport' => $usersReport,
                        'barangayReport' => null,
                        "servicesData" => null,
                        "comorbidityData" => null,
                        "base64Image" => $base64Image,
                        "currentDate" => $currentDate,
                        $pdfreport = "users",
                    ]);
            } elseif ($genaratepdF && $genaratepdF === "services") {
                # code...
                $pdf = PDF::loadView('dashboard.reports.report-pdf',
                    [
                        'usersReport' => null,
                        'barangayReport' => null,
                        "servicesData" => $servicesData,
                        "comorbidityData" => null,
                        "base64Image" => $base64Image,
                        "currentDate" => $currentDate,
                        $pdfreport = "services",
                    ]);

            } elseif ($genaratepdF && $genaratepdF === "barangay") {
                # code...
                $pdf = PDF::loadView('dashboard.reports.report-pdf',
                    [
                        'usersReport' => null,
                        'barangayReport' => $barangayReport,
                        "servicesData" => null,
                        "comorbidityData" => null,
                        "base64Image" => $base64Image,
                        "currentDate" => $currentDate,
                        $pdfreport = "barangay",
                    ]);

            } elseif ($genaratepdF && $genaratepdF === "comorbidities") {
                # code...
                $pdf = PDF::loadView('dashboard.reports.report-pdf',
                    [
                        'usersReport' => null,
                        'barangayReport' => null,
                        "servicesData" => null,
                        "comorbidityData" => $comorbidityData,
                        "base64Image" => $base64Image,
                        "currentDate" => $currentDate,
                        $pdfreport = "comorbidities",
                    ]);

            } else {
                # code...
                $pdf = PDF::loadView('dashboard.reports.report-pdf',
                    [
                        'usersReport' => $usersReport,
                        'barangayReport' => $barangayReport,
                        "servicesData" => $servicesData,
                        "comorbidityData" => $comorbidityData,
                        "base64Image" => $base64Image,
                        "currentDate" => $currentDate,
                        $pdfreport = "All",
                    ]);
            }
            // Optional: You can customize the PDF options here
            $pdf->setOptions([
                'dpi' => 100,
                'defaultFont' => 'sans-serif',
                'defaultPaperSize' => 'a4',
            ]);

            // return $pdf->stream('eAlagaReport');

            // Generate the PDF and get the raw content
            $pdfContent = $pdf->output();

            return response()->json([
                "success" => true,
                'pdfUrl' => "data:application/pdf;base64," . base64_encode($pdfContent),
                'pdfreport' => $pdfreport,

            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "success" => false,
                'message' => $th->getmessage(),
            ]);

        }
    }

}
