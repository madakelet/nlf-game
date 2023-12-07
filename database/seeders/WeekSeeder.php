<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    public function run(): void
    {
        for($i = 1; $i <= 18; $i++) {
            $response = file_get_contents("http://sports.core.api.espn.com/v2/sports/football/leagues/nfl/seasons/2023/types/2/weeks/$i?lang=en&region=us");
            $response = json_decode($response, true);
            $startDate = new \DateTime($response['startDate'], new \DateTimeZone('UTC'));
            $endDate = new \DateTime($response['endDate'], new \DateTimeZone('UTC'));
            $startDate->setTimezone(new \DateTimeZone('Europe/Budapest'));
            $endDate->setTimezone(new \DateTimeZone('Europe/Budapest'));
            $weekNr = $response['text'];

            Week::create([
                'week' => $weekNr,
                'start_date' => $startDate->format('Y-m-d H:i:s'),
                'end_date' => $endDate->format('Y-m-d H:i:s'),
                'season' => 2023
            ]);
        }       
    }

}
