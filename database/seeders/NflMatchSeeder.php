<?php

namespace Database\Seeders;

use App\Models\NflMatch;
use App\Models\Team;
use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class NflMatchSeeder extends Seeder
{
    public $weekEventUrls = [];
    public $response = [];
    public $year;

    public function __construct()
    {
        $this->year = date("Y");
    }

    public function run(): void
    {
        $this->getWeekEventUrls();
        foreach ($this->weekEventUrls as $week => $weekEventUrl) {
            $this->command->info("Processing Week: " . ($week + 1));
            foreach ($weekEventUrl as $match => $eventUrl) {
                $this->command->info(
                    "Getting match: " .
                        ($match + 1) .
                        "/" .
                        count($weekEventUrl)
                );
                $this->createMatch($eventUrl['$ref']);
            }
        }
    }

    public function getWeekEventUrls(): void
    {
        for ($i = 1; $i <= 18; $i++) {
            $this->command->info("Week: $i");
            $response = file_get_contents(
                "http://sports.core.api.espn.com/v2/sports/football/leagues/nfl/seasons/" .
                    $this->year .
                    "/types/2/weeks/$i/events?lang=en&region=us"
            );
            $response = json_decode($response, true);
            $this->weekEventUrls[] = $response["items"];
        }
    }

    public function createMatch($url): void
    {
        //$response = file_get_contents($this->weekEventUrls[0][0]['$ref']);
        $this->response = file_get_contents($url);
        $this->response = json_decode($this->response, true);
        $matchData["api_id"] = $this->response["id"];
        $matchData["start_time"] = $this->changeTimeZoneToBudapest(
            $this->response
        );
        $matchData["final_score"] = $this->getFinalScore(
            $matchData["start_time"]
        );
        $matchData["start_time"] = $matchData["start_time"]->format(
            "Y-m-d H:i:s"
        );
        $matchData["week"] = $this->getWeek();
        $matchData["stadium"] = $this->getStadium();
        $matchData["home_team_id"] = $this->getTeamId(0);
        $matchData["away_team_id"] = $this->getTeamId(1);
        $week = Week::where("week", $matchData["week"])
            ->where("season", $this->year)
            ->first();
        $matchData["week_id"] = $week->id;
        NflMatch::create($matchData);
    }

    public function changeTimeZoneToBudapest(): \DateTime
    {
        $start_time = $this->response["date"];
        $dateTime = new \DateTime($start_time, new \DateTimeZone("UTC"));
        $dateTime->setTimezone(new \DateTimeZone("Europe/Budapest"));

        return $dateTime;
    }

    public function getScores($isAway): int
    {
        $score = file_get_contents(
            $this->response["competitions"][0]["competitors"][$isAway]["score"][
                '$ref'
            ]
        );
        $score = json_decode($score, true);

        return $score["value"];
    }

    public function getWeek(): string
    {
        $weekData = file_get_contents($this->response["week"]['$ref']);
        $weekData = json_decode($weekData, true);

        return $weekData["text"];
    }

    public function getStadium(): string
    {
        return $this->response["competitions"]["0"]["venue"]["fullName"];
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

    public function getTeamId($isAway): string
    {
        return Team::where(
            "api_id",
            $this->response["competitions"][0]["competitors"][$isAway]["id"]
        )->first()->id;
    }
}
