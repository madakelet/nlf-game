<?php

namespace App\Console\Commands;

use App\Models\NflMatch;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class UpdateScores extends Command
{
    protected $signature = 'app:update-scores';
    protected $description = 'Command description';
    public Collection $nflMatches;
    public function handle()
    {
        $this->getMatches();
        $this->updateMatches();
    }

    public function getMatches(): void
    {
        $this->nflMatches = NflMatch::where('start_time', '<', now())
            ->where('final_score', "0-0")
            ->get();
    }

    public function updateMatches(): void
    {
        foreach ($this->nflMatches as $match) {
            Log::channel('match-update')->info('Updating match #' . $match->id . ' ' . $match->homeTeam->name . ' - ' . $match->awayTeam->name);
            try {
                $match->update([
                    'final_score' => $this->getFinalScore($match)
                ]);
            } catch (\Exception $e) {
                Log::channel('match-update')->error('Error updating match #' . $match->id . ' ' . $match->homeTeam->name . ' - ' . $match->awayTeam->name);
                continue;
            }

            Log::channel('match-update')->info('Match updated! New score: ' . $match->final_score);
        }
    }

    public function getFinalScore($match)
    {
        return $this->getScore($match, 0) . "-" . $this->getScore($match, 1);
    }

    public function getScore($match, $isAway)
    {
        $teamId = $isAway == 0 ? $match->homeTeam->api_id : $match->awayTeam->api_id;
        $url = "http://sports.core.api.espn.com/v2/sports/football/leagues/nfl/events/" .
            $match->api_id .
            "/competitions/" .
            $match->api_id .
            "/competitors/" .
            $teamId .
            "/score?lang=en&region=us";
        $scoreData = file_get_contents($url);
        $scoreData = json_decode($scoreData, true);

        return $scoreData['value'];
    }
}
