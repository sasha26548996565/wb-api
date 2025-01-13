<?php

namespace App\Console;

use App\Console\Commands\UpdateDataCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        UpdateDataCommand::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('update:data')->twiceDaily(1, 13);
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
