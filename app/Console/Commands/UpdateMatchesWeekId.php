<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateMatchesWeekId extends Command
{
    protected $signature = 'app:update-matches-week-id';
    protected $description = 'Updates the week_id column in the matches table.';

    public function handle()
    {
        $this->info('Updating matches week_id column...');

        $matches = \App\Models\NflMatch::all();

        foreach ($matches as $match) {
            $week = \App\Models\Week::where('week', $match->week)->first();
            $match->week_id = $week->id;
            $match->save();
        }

        $this->info('Done!');
    }
}
