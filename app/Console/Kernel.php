<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            \App\Models\MoU::where('waktuSelesai', '<', \Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'Tidak Berlaku']);
        })->everyMinute();
        $schedule->call(function () {
            \App\Models\MoU::whereBetween('waktuSelesai', [\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->update(['status' => 'Hampir Berakhir']);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
