<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SetCurrentWeekCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-current-week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the current week based on the current date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Budapest'));
        $currentDate->setTimezone(new \DateTimeZone('UTC'));
        $currentDate = $currentDate->format('Y-m-d H:i:s');

        $week = \App\Models\Week::where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        if ($week) {
            \App\Models\Week::where('is_current', true)->update(['is_current' => false]);
            $week->is_current = true;
            $week->save();
            Log::channel('match-update')->info('Current week set to ' . $week->week . '.');
        } else {
            Log::channel('match-update')->error('No current week found.');
        }
    }
}
