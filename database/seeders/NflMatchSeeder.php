<?php

namespace Database\Seeders;

use App\Models\NflMatch;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NflMatchSeeder extends Seeder
{
    public $weekEventUrls = [];
    public $response = [];
    
    public function run(): void
    {
        $this->getWeekEventUrls();
        foreach ($this->weekEventUrls as $weekEventUrl) {
            foreach ($weekEventUrl as $eventUrl) {
                $this->createMatch($eventUrl['$ref']);
            }
        }
    }

    public function getWeekEventUrls(): void
    {
        for ($i = 1; $i <= 18; $i++) {
            $response = file_get_contents("http://sports.core.api.espn.com/v2/sports/football/leagues/nfl/seasons/2023/types/2/weeks/$i/events?lang=en&region=us");
            $response = json_decode($response, true);
            $this->weekEventUrls[] = $response['items'];
        }
    }

    public function createMatch($url): void
    {
        //$response = file_get_contents($this->weekEventUrls[0][0]['$ref']);
        $this->response = file_get_contents($url);
        $this->response = json_decode($this->response, true);

        $matchData['api_id'] = $this->response['id'];
        $matchData['start_time'] = $this->changeTimeZoneToBudapest($this->response);
        $matchData['final_score'] = $this->getFinalScore($matchData['start_time']);
        $matchData['start_time'] = $matchData['start_time']->format('Y-m-d H:i:s');
        $matchData['week'] = $this->getWeek();
        $matchData['stadium'] = $this->getStadium();
        $matchData['home_team_id'] = $this->getTeamId(0);
        $matchData['away_team_id'] = $this->getTeamId(1);

        NflMatch::create($matchData);
    }

    public function changeTimeZoneToBudapest(): \DateTime
    {
        $start_time = $this->response['date'];
        $dateTime = new \DateTime($start_time, new \DateTimeZone('UTC'));
        $dateTime->setTimezone(new \DateTimeZone('Europe/Budapest'));

        return $dateTime;
    }

    public function getScores($isAway): int
    {
        $score = file_get_contents($this->response['competitions'][0]['competitors'][$isAway]['score']['$ref']);
        $score = json_decode($score, true);

        return $score['value'];
    }

    public function getWeek(): string
    {
        $weekData = file_get_contents($this->response['week']['$ref']);
        $weekData = json_decode($weekData, true);

        return $weekData['text'];
    }

    public function getStadium(): string
    {
        $venueData = file_get_contents($this->response['venues'][0]['$ref']);
        $venueData = json_decode($venueData, true);

        return $venueData['fullName'];
    }

    public function getFinalScore($startTime): string
    {
        $now = new \DateTime();
        $finalScore = "0-0";
        if ($startTime < $now) {
            $finalScore = $this->getScores(0) . "-" . $this->getScores(1);
        }

        return $finalScore;
    }

    public function getTeamId($isAway): int
    {
        return Team::where('api_id', $this->response['competitions'][0]['competitors'][$isAway]['id'])->first()->id;
    }
}
