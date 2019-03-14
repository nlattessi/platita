<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Gasto;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecordatorioServicio;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $gastosPorVencer = Gasto::whereDate('vencimiento', '=', now()->addDays(2)->setTime(0, 0, 0)->toDateTimeString())->get();

            foreach ($gastosPorVencer as $gasto) {
                Mail::to('nlattessi@gmail.com')->queue(new RecordatorioServicio($gasto));
            }
        })->timezone('America/Argentina/Buenos_Aires')->dailyAt('10:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
