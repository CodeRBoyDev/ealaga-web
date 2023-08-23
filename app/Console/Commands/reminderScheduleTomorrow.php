<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class reminderScheduleTomorrow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminderScheduleTomorrow';

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
        Log::info('reminderScheduleTomorrow command started.');
        app(CronJobController::class)->reminderScheduleTomorrow();
        Log::info('reminderScheduleTomorrow command completed successfully.');
    }
}
