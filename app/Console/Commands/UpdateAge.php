<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
// Import the Log facade

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
        Log::info('UpdateAge command started.');
        app(CronJobController::class)->updateAge();
        Log::info('UpdateAge command completed successfully.');
    }

}
