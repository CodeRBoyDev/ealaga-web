<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function ServiceList()
    {
        //
        try {
           
            // Get the current date and time
            $currentDate = Carbon::now('Asia/Manila');

            $services = DB::table('services')->get();

          
// dd($services);
            if (request()->ajax()) {
                return response()->json(['services' => $services]);
            } else {
                return view('dashboard.service.service', compact('services'));
            }


       } catch (\Exception $e) {
           return "Unable to connect to the database: " . $e->getMessage();
       }
    }


    public function ServiceAdd(Request $request)
    {
        try {
            // dd("ho\i");
            $data = $request->all();

            $scheduleID = DB::table('services')->insertGetId([
                'title' => $data['title'] ?? null,
                'description' => $data['description'] ?? null,
            ]);


            if ($request->hasFile('icon')) {
                // Store the uploaded avatar in the storage/app/public/avatars directory
                $iconPath = $request->file('icon')->store('icon', 'public');
                // Update the user record with the avatar path
                DB::table('services')->where('id', $scheduleID)->update(['icon' => "storage/" . $iconPath]);
                // Return a success response or redirect to a success page
            }

            return response()->json(['message' => $data]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
