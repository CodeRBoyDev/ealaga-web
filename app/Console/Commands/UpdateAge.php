<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

// Import the Log facade

class UpdateAge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_age';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users age';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        // Your API call logic using the Http facade
        // $response = Http::get('https://api.example.com/data');

        // // Handle the API response as needed
        // if ($response->successful()) {
        //     $data = $response->json();
        //     // Process the API data
        // } else {
        //     $this->error('API call failed');
        // }
        Log::channel('custom_api_logs')->info('API call successful');

    }
}
