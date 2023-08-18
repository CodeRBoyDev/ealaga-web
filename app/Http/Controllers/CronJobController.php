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

class CronJobController extends Controller
{


    public function restriction()
    {
        try {
            $usersToRestrict = DB::table('users')
            ->where(function ($query) {
                $query->where('is_active', 1)
                    ->orWhere('is_restricted', 1);
            })
            ->get();


         


            foreach ($usersToRestrict as $user) {
                if ($user->is_restricted && $user->restrictionExpiration <= Carbon::now()) {
                    DB::table('users')
                        ->where('id', $user->id)
                        ->update([
                            'is_active' => 1,
                            'is_restricted' => 0,
                            'restrictionExpiration' => null
                        ]);
            
                    // DB::table('notification')->insert([
                    //     'user_id' => $user->id,
                    //     'type' => 'status_restricted',
                    //     'description' => "Your account has been activated."
                    // ]);
                    
                    // Additional actions if needed
                } else {
                    $schedules = DB::table('schedule')
                    ->where('user_id', $user->id)
                    ->when($user->lastRestricted, function ($query) use ($user) {
                        return $query->where('schedule_date', '>=', $user->lastRestricted);
                    })
                    ->get();
                
                // dd($schedules);
                
         
                    $unattendedCount = 0;
            
                    foreach ($schedules as $schedule) {
                        if ($schedule->status === 2) {
                            $unattendedCount++;
                            DB::table('users')
                                ->where('id', $user->id)
                                ->increment('notAttendedCount');
                        }
                    }

              
                    // dd();
                    // $test[] = $unattendedCount;

                    if ($unattendedCount >= 2) {
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update([
                                'is_active' => 0,
                                'is_restricted' => 1,
                                'lastRestricted' => Carbon::now(),
                                'restrictionExpiration' => Carbon::now()->addDays(7),
                                'notAttendedCount' => 0
                            ]);
            
                        // DB::table('notification')->insert([
                        //     'user_id' => $user->id,
                        //     'type' => 'status_restricted',
                        //     'description' => "We regret to inform you that your Alaga account has been temporarily restricted for a period of 7 days. This action has been taken as you were unable to attend 5 scheduled appointments, which has resulted in the restriction of your account. Due to this restriction, you will not be able to book any new healthcare services during this time. As a platform designed to provide healthcare services to the elderly community in Taguig City, we prioritize the needs of our clients and strive to ensure efficient scheduling and booking processes. We understand the importance of timely attendance for the smooth operation of our services, and we hope to have your cooperation in adhering to the scheduled appointments in the future. Thank you for your understanding."
                        // ]);
                        
                        // Additional actions if needed
                        $test[] = "User $user->firstname $user->lastname has been restricted.";

                      
                    }
                }
          

            }
            return response()->json(['schedule' => $test]);

            // return response()->json(['schedule' => $test]);

    
        } catch (\Exception $e) {
        


            die('error: ' . $e->getMessage());

        }
        
        }


        public function reminderScheduleTomorrow()
        {

            try {
                

                $currentDate = Carbon::now('Asia/Manila')->addDay();
               

                $schedulesTomorrow = DB::table('schedule')
                ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
                ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
                ->where('schedule.status', 0)
                ->whereDate('schedule_date', $currentDate->format('Y-m-d'))
                ->selectRaw('schedule.id as schedule_id, schedule.user_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status')
                ->groupBy('schedule.id','schedule.user_id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status')
                ->groupBy('schedule.id')
                ->get();

                foreach ($schedulesTomorrow as $schedule) {
                    
                    // $test[] = "We are informing you that you have a schedule tomorrow " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services.";

                     DB::table('notification')->insert([
                        'user_id' => $schedule->user_id ?? null,
                        'title' => "Schedule Reminder" ?? null,
                        'message' => "We are informing you that you have a schedule tomorrow " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services at " . ($schedule->schedule_time == 0 ? '8:00am' : ($schedule->schedule_time == 1 ? '1:00pm' : 'unknown time')) . " at Taguig City Center for the Elderly.",
                        'timestamp' => date('Y-m-d H:i:s') ?? null,
            
                    ]);
                    
                }

                // return response()->json(['schedule' => $test]);
    
        
            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }

             

        }


        public function reminderScheduleToday()
        {

            try {
                

                $currentDate = Carbon::now('Asia/Manila');
               

                $schedulesToday = DB::table('schedule')
                ->leftjoin('param_schedule_services', 'schedule.id', '=', 'param_schedule_services.schedule_id')
                ->leftjoin('services', 'services.id', '=', 'param_schedule_services.service_id')
                ->where('schedule.status', 0)
                ->whereDate('schedule_date', $currentDate->format('Y-m-d'))
                ->selectRaw('schedule.id as schedule_id, schedule.user_id, GROUP_CONCAT(services.title) as services, schedule.schedule_date, schedule.schedule_time, schedule.status')
                ->groupBy('schedule.id','schedule.user_id', 'schedule.schedule_date', 'schedule.schedule_time', 'schedule.status')
                ->groupBy('schedule.id')
                ->get();

                
                foreach ($schedulesToday as $schedule) {
                    
                    // $test[] = "We are informing you that you have a schedule tomorrow " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services.";

                     DB::table('notification')->insert([
                        'user_id' => $schedule->user_id ?? null,
                        'title' => "Schedule Reminder" ?? null,
                        'message' => "We are informing you that you have a schedule today " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services at " . ($schedule->schedule_time == 0 ? '8:00am' : ($schedule->schedule_time == 1 ? '1:00pm' : 'unknown time')) . " at Taguig City Center for the Elderly.",
                        'timestamp' => date('Y-m-d H:i:s') ?? null,
            
                    ]);
                    
                }

                // return response()->json(['schedule' => $test]);

                // dd($schedulesToday);
    
        
            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }

             

        }


        public function updateSchedule()
        {

            try {
                

                $currentDate = Carbon::now('Asia/Manila');
               

                $schedulesToday = DB::table('schedule')
                ->where('status', 0)
                ->whereDate('schedule_date', $currentDate->format('Y-m-d'))
                ->get();

                
                foreach ($schedulesToday as $schedule) {
                    
                    DB::table('schedule')
                    ->where('id', $schedule->id)
                    ->update(['status' => 2]);

                }

        
            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }

             

        }
        

        public function reminderVolunteerTomorrow()
        {

            try {
                

                $currentDate = Carbon::now('Asia/Manila')->addDay();
               

                $volunteerTomorrow = DB::table('params_volunteer_application as params')
                ->leftjoin('volunteer', 'volunteer.id', '=', 'params.volunteer_id')
                ->where('params.status', 1)
                ->whereDate('volunteer.scheduled_date', $currentDate->format('Y-m-d'))
                ->get();

                // dd($volunteerTomorrow);
                
                foreach ($volunteerTomorrow as $volunteer) {
                    
                    // $test[] = "We are informing you that you have a schedule tomorrow " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services.";

                     DB::table('notification')->insert([
                        'user_id' => $volunteer->user_id ?? null,
                        'title' => "Volunteer Reminder" ?? null,
                        'message' => "We are informing you that you have a volunteer tomorrow " . Carbon::parse($volunteer->scheduled_date)->format('F j, Y') . " for $volunteer->title at " . Carbon::parse($volunteer->scheduled_time)->format('g:i a') . '.',
                        'timestamp' => date('Y-m-d H:i:s') ?? null,
            
                    ]);
                    
                }
    
        
            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }

             

        }


        public function reminderVolunteerToday()
        {

            try {
                

                $currentDate = Carbon::now('Asia/Manila');
               

                $volunteerToday = DB::table('params_volunteer_application as params')
                ->leftjoin('volunteer', 'volunteer.id', '=', 'params.volunteer_id')
                ->where('params.status', 1)
                ->whereDate('volunteer.scheduled_date', $currentDate->format('Y-m-d'))
                ->get();

                
                foreach ($volunteerToday as $volunteer) {
                    
                    // $test[] = "We are informing you that you have a schedule tomorrow " . Carbon::parse($schedule->schedule_date)->format('F j, Y') . " for $schedule->services.";

                     DB::table('notification')->insert([
                        'user_id' => $volunteer->user_id ?? null,
                        'title' => "Volunteer Reminder" ?? null,
                        'message' => "We are informing you that you have a volunteer today " . Carbon::parse($volunteer->scheduled_date)->format('F j, Y') . " for $volunteer->title at " . Carbon::parse($volunteer->scheduled_time)->format('g:i a') . '.',
                        'timestamp' => date('Y-m-d H:i:s') ?? null,
            
                    ]);
                    
                }

                // return response()->json(['schedule' => $test]);

                // dd($volunteerToday);
    
        
            } catch (\Exception $e) {
            
    
    
                die('error: ' . $e->getMessage());
    
            }

             

        }


        public function updateAge()
            {

                try {
                    
                    $currentDate = $this->getCurrentDateAsiaManila();
                    // Convert the date to the desired format
                    $formattedDate = date('Y-m-d', strtotime($currentDate));

                    $getBirthdayUsers = DB::table('users')
                        ->select('birthday', 'id as user_id')
                        ->whereNotNull('birthday')
                        ->get();

                    $matchingBirthdayUsers = [];

                    foreach ($getBirthdayUsers as $user) {
                        $birthday = Carbon::parse($user->birthday);

                        // Compare month and day of birthday with current date
                        if ($birthday->format('md') === $currentDate->format('md')) {
                            // Calculate age by subtracting birth year from current year
                            $age = $currentDate->year - $birthday->year;

                            // Update the user's age in the database
                            DB::table('users')
                                ->where('id', $user->user_id)
                                ->update(['age' => $age]);
                        }
                    }
        
            
                } catch (\Exception $e) {
                
        
        
                    die('error: ' . $e->getMessage());
        
                }

                 

            }



}