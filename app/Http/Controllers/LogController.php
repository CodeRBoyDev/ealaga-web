<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class LogController extends Controller
{
    protected function logActivity($user_id, $action, $details, $url, $httpMethod)
    {
        $timestamp = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

        $log = [
            'timestamp' => $timestamp,
            'user_id' => $user_id,
            'action' => $action,
            'details' => $details,
            'url' => $url,
            'http_method' => $httpMethod, // Include the HTTP method
        ];

        $logFile = storage_path('app/public/logs/activity_log.json');
        $directory = dirname($logFile);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Read existing log contents or initialize an empty array
        $logContents = [];
        if (file_exists($logFile)) {
            $logContents = json_decode(file_get_contents($logFile), true);
        }

        // Add the new log entry
        $logContents['logs'][] = $log;

        // Write the updated log contents to the file
        file_put_contents($logFile, json_encode($logContents, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Log entry added successfully']);
    }

    public function getLogs()
    {
        try {
            return view('dashboard.logs'); // Pass the paginated result
        } catch (\Throwable $th) {
            // Handle any errors that might occur
            return view('dashboard.logs', compact('logs'))->withErrors(['error' => 'An error occurred while fetching logs']);
        }
    }

    public function apiLogs()
    {
        try {
            //code...
            $logFile = storage_path('app/public/logs/activity_log.json');

            if (file_exists($logFile)) {
                $logContents = json_decode(file_get_contents($logFile), true);
                $logs = $logContents['logs'];

                // Sort the logs array by timestamp in descending order
                usort($logs, function ($a, $b) {
                    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
                });
            } else {
                $logs = [];
            }
            return response()->json(['success' => true, "data" => $logs]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, "data" => $th->getmessage()]);
        }
    }
}
