<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class reminderVolunteerToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminderVolunteerToday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('reminderVolunteerToday command started.');
        app(CronJobController::class)->reminderVolunteerToday();
        Log::info('reminderVolunteerToday command completed successfully.');
    }
}
