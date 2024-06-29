<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('log:message "این یک پیام تست است"')->everyTenSeconds();

        // $schedule->command('log:message "این یک پیام تست است"')->timezone('Asia/Tehran')->at('14:33');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }

    protected $commands = [
        \App\Console\Commands\LogMessage::class,
    ];
}
