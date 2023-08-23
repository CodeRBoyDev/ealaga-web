<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class reminderVolunteerTomorrow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminderVolunteerTomorrow';

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
        Log::info('reminderVolunteerTomorrow command started.');
        app(CronJobController::class)->reminderVolunteerTomorrow();
        Log::info('reminderVolunteerTomorrow command completed successfully.');
    }
}
