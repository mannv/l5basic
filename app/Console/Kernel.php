<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Vocabulary\Console\CrawlerGroupCommand;
use Modules\Vocabulary\Console\CrawlerWordAudioCommand;
use Modules\Vocabulary\Console\CrawlerWordCommand;
use Modules\Vocabulary\Console\CrawlerWordImageCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CrawlerGroupCommand::class,
        CrawlerWordCommand::class,
        CrawlerWordImageCommand::class,
        CrawlerWordAudioCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
