<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questionTypes = array(
            ["match_winner", "Meccs győztese"], 
            ["final_score", "Pontos végeredmény"],
            ["select", "Csapatválasztós"],
            ["special", "Speciális"],
        );
        foreach ($questionTypes as $questionType) {
            \App\Models\QuestionType::create([
                'type' => $questionType[0],
                'description' => $questionType[1],
            ]);
        }
    }
}
