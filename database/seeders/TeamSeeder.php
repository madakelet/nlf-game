<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    
    public function run(): void
    {
        for($i = 1; $i <= 34; $i++) {
            if($i != 31 && $i != 32) {
                $response = file_get_contents("http://sports.core.api.espn.com/v2/sports/football/leagues/nfl/seasons/2023/teams/$i?lang=en&region=us");
                $response = json_decode($response, true);
                $group = file_get_contents($response['groups']['$ref']);
                $group = json_decode($group, true);
    
                $team = new Team();
                $team->api_id = $response['id'];
                $team->name = $response['displayName'];
                $team->short_name = $response['abbreviation'];
                $team->logo_url = $response['logos'][0]['href'];
                $team->group = $group['name'];
                $team->save();
            }
        }
    }
}
