<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        'App\Console\Commands\AutoEmail',
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('emails:users')
                 ->timezone('Africa/Nairobi')
                 ->dailyAt('18:50');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
