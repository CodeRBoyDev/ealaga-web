<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\Mail\EmailNotification;
use App\Mail\ErrorEmailNotification;
use Illuminate\Support\Facades\Mail;

class HolidayController extends Controller
{
    public function HolidaysView()
    {
        //
        try {
            // $header_link = [
            //     '/css/admin/fullcalendar.bundle.css',
            //     // 'css/admin/leaves.css'
            // ];

            // $header_script = [
            //     '/js/admin/fullcalendar.bundle.js',
            //     '/plugins/custom/datatables/datatables.bundle.js',
            //     '/js/widgets.bundle.js',
            //     '/js/custom/widgets.js',
            //     '/js/custom/apps/chat/chat.js',
            //     '/js/custom/utilities/modals/users-search.js',
            //     'js/admin/holiday.js'
            // ]; 

            $currentYear = date('Y');
            $holidays_check = DB::table('holidays')->get();
            foreach ($holidays_check as $holiday_check) {
                // Get the current date
                $date = $holiday_check->date;
                    
                // Create a new date with the current year
                $newDate = $currentYear . substr($date, 4);
                    
                // Update the holiday's date in the database
                DB::table('holidays')
                    ->where('id', $holiday_check->id)
                    ->update(['date' => $newDate]);
            }

            $holidays = DB::table('holidays')->get();
            // dd($holidays);
            if (count($holidays) > 0) {
                foreach ($holidays as $holiday) {
                    $color = '' ;


                    if ($holiday->holiday_type === 1) {
                        $color = '#5dd091';
                    } else {
                        if ($holiday->holiday_type === 2) {
                            $color = '#009ef7';
                        } else {
                            if ($holiday->holiday_type === 3) {
                                $color = '#ffc700';
                            } else {
                                $color = 'black';
                            }
                        }
                    }
                    $events[] = [
                        'id' => $holiday->id,
                        'title' => $holiday->name,
                        'start' => $holiday->date,
                        'end' => $holiday->date,
                        'backgroundColor' => $color,
                        'borderColor' => $color,
                    ];        
                };
            } else {
                $events = [];
            }

            if (request()->ajax()) {
                return response()->json(['events' => $events]);
            }else{
                return view('dashboard.holidays.holidays', compact('events'));
            }

            } catch (\Exception $e) {
                die('Could not connect to the database: ' . $e->getMessage());
            }
        }

        public function GetPhHolidays()
        {
            try {
    
                $holidays = DB::table('holidays')
                ->whereIn('holiday_type', [1, 2])
                ->orderBy('date', 'asc')
                ->get();
                return response()->json($holidays);
            } catch (\Exception $e) {
                die('Could not connect to the database: ' . $e->getMessage());
            }
        }

        public function GetCuHolidays()
        {
            try {
    
                $holidays = DB::table('holidays')
                ->whereNotIn('holiday_type', [1, 2])
                ->orderBy('date', 'asc')
                ->get();
                return response()->json($holidays);
            } catch (\Exception $e) {
                die('Could not connect to the database: ' . $e->getMessage());
            }
        }

        public function HolidayGet(Request $request, $id)
        {
            $holiday = DB::table('holidays')
            ->where('id', $id)
            ->first();
            return response()->json($holiday);
        }


        public function HolidayUpdate(Request $request, $id)
        {
            $timezone = 'Asia/Manila';
            date_default_timezone_set($timezone);
            $now = date('Y-m-d H:i:s');
    
            $data = $request->all();
            $new_name  = '';
            $new_holiday_type  = '';
    
            $old_holiday = DB::table('holidays')
            ->where('id', $id)
            ->first();
    
            if ($data['edit_name'] === null) {
                $new_name  = $old_holiday->name;
            } else {
                $new_name = $data['edit_name'];
            }
    
            if ($data['edit_holiday_type'] === null) {
                $new_holiday_type  = $old_holiday->holiday_type;
            } else {
                $new_holiday_type = $data['edit_holiday_type'];
            }
            
    
            $holiday = DB::table('holidays')
            ->where('id', $id)
            ->update([
                'name' => $new_name,
                'holiday_type' => $new_holiday_type,
                'updatedAt' => $now
            ]);
    
            // return response()->json($holiday);
            return response()->json($id);
        }


        public function HolidayAdd(Request $request)
        {
            $timezone = 'Asia/Manila';
            date_default_timezone_set($timezone);
            $now = date('Y-m-d H:i:s');
            $data = $request->all();
    
            DB::table('holidays')->insert([
                'name' => $data['name'],
                'date' => $data['date'],
                'holiday_type' => $data['holiday_type'],
                'createAt' => $now
            ]);
            return response()->json(['message' => 'Data received and inserted successfully']);
        }


        public function HolidayDelete($id)
        {
            // DB::table('overtimes')->where('id', $id)->delete();
            DB::table('holidays')->where('id', $id)->delete();
            // Log::debug("Deleting leave request with ID: $id");
            return response()->json(['status' => 'success']);
            
        }

}