<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $nflTeams = array(
            array(
                "team" => "Arizona Cardinals",
                "shortName" => "ARI",
                "conference" => "NFC",
                "division" => "West"
            ),
            array(
                "team" => "Atlanta Falcons",
                "shortName" => "ATL",
                "conference" => "NFC",
                "division" => "South"
            ),
            array(
                "team" => "Baltimore Ravens",
                "shortName" => "BAL",
                "conference" => "AFC",
                "division" => "North"
            ),
            array(
                "team" => "Buffalo Bills",
                "shortName" => "BUF",
                "conference" => "AFC",
                "division" => "East"
            ),
            array(
                "team" => "Carolina Panthers",
                "shortName" => "CAR",
                "conference" => "NFC",
                "division" => "South"
            ),
            array(
                "team" => "Chicago Bears",
                "shortName" => "CHI",
                "conference" => "NFC",
                "division" => "North"
            ),
            array(
                "team" => "Cincinnati Bengals",
                "shortName" => "CIN",
                "conference" => "AFC",
                "division" => "North"
            ),
            array(
                "team" => "Cleveland Browns",
                "shortName" => "CLE",
                "conference" => "AFC",
                "division" => "North"
            ),
            array(
                "team" => "Dallas Cowboys",
                "shortName" => "DAL",
                "conference" => "NFC",
                "division" => "East"
            ),
            array(
                "team" => "Denver Broncos",
                "shortName" => "DEN",
                "conference" => "AFC",
                "division" => "West"
            ),
            array(
                "team" => "Detroit Lions",
                "shortName" => "DET",
                "conference" => "NFC",
                "division" => "North"
            ),
            array(
                "team" => "Green Bay Packers",
                "shortName" => "GB",
                "conference" => "NFC",
                "division" => "North"
            ),
            array(
                "team" => "Houston Texans",
                "shortName" => "HOU",
                "conference" => "AFC",
                "division" => "South"
            ),
            array(
                "team" => "Indianapolis Colts",
                "shortName" => "IND",
                "conference" => "AFC",
                "division" => "South"
            ),
            array(
                "team" => "Jacksonville Jaguars",
                "shortName" => "JAX",
                "conference" => "AFC",
                "division" => "South"
            ),
            array(
                "team" => "Kansas City Chiefs",
                "shortName" => "KC",
                "conference" => "AFC",
                "division" => "West"
            ),
            array(
                "team" => "Las Vegas Raiders",
                "shortName" => "LV",
                "conference" => "AFC",
                "division" => "West"
            ),
            array(
                "team" => "Los Angeles Chargers",
                "shortName" => "LAC",
                "conference" => "AFC",
                "division" => "West"
            ),
            array(
                "team" => "Los Angeles Rams",
                "shortName" => "LAR",
                "conference" => "NFC",
                "division" => "West"
            ),
            array(
                "team" => "Miami Dolphins",
                "shortName" => "MIA",
                "conference" => "AFC",
                "division" => "East"
            ),
            array(
                "team" => "Minnesota Vikings",
                "shortName" => "MIN",
                "conference" => "NFC",
                "division" => "North"
            ),
            array(
                "team" => "New England Patriots",
                "shortName" => "NE",
                "conference" => "AFC",
                "division" => "East"
            ),
            array(
                "team" => "New Orleans Saints",
                "shortName" => "NO",
                "conference" => "NFC",
                "division" => "South"
            ),
            array(
                "team" => "New York Giants",
                "shortName" => "NYG",
                "conference" => "NFC",
                "division" => "East"
            ),
            array(
                "team" => "New York Jets",
                "shortName" => "NYJ",
                "conference" => "AFC",
                "division" => "East"
            ),
            array(
                "team" => "Philadelphia Eagles",
                "shortName" => "PHI",
                "conference" => "NFC",
                "division" => "East"
            ),
            array(
                "team" => "Pittsburgh Steelers",
                "shortName" => "PIT",
                "conference" => "AFC",
                "division" => "North"
            ),
            array(
                "team" => "San Francisco 49ers",
                "shortName" => "SF",
                "conference" => "NFC",
                "division" => "West"
            ),
            array(
                "team" => "Seattle Seahawks",
                "shortName" => "SEA",
                "conference" => "NFC",
                "division" => "West"
            ),
            array(
                "team" => "Tampa Bay Buccaneers",
                "shortName" => "TB",
                "conference" => "NFC",
                "division" => "South"
            ),
            array(
                "team" => "Tennessee Titans",
                "shortName" => "TEN",
                "conference" => "AFC",
                "division" => "South"
            ),
            array(
                "team" => "Washington Football Team",
                "shortName" => "WAS",
                "conference" => "NFC",
                "division" => "East"
            )
        );

        foreach ($nflTeams as $team) {
            $newTeam = new \App\Models\Team();
            $newTeam->name = $team['team'];
            $newTeam->short_name = $team['shortName'];
            $newTeam->conference = $team['conference'];
            $newTeam->division = $team['division'];
            $newTeam->save();
        }
    }
}
