<?php

namespace App\Console;

use App\Console\Commands\AddTokenCommand;
use App\Console\Commands\AddAccountCommand;
use App\Console\Commands\AddCompanyCommand;
use App\Console\Commands\UpdateDataCommand;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\AddTokenTypeCommand;
use App\Console\Commands\AddApiServiceCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        UpdateDataCommand::class,
        AddAccountCommand::class,
        AddApiServiceCommand::class,
        AddCompanyCommand::class,
        AddTokenCommand::class,
        AddTokenTypeCommand::class,
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
