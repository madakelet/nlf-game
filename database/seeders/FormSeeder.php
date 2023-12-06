<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\NflMatch;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nflMatches = NflMatch::all()->groupBy('week');
        foreach ($nflMatches as $week => $matches) {
            $form = new Form();
            $form->week = $week;
            $form->save();
            foreach ($matches as $match) {
                if (!$this->checkIfTNF($match)) {
                    $this->createQuestion($match, $form);
                } else {
                    $tnfForm = $this->checkIfTNFAlreadyExistsForWeek($week . ' TNF');
                    if(is_null($tnfForm)) {
                        $this->createQuestion($match);
                    } else {
                        $this->createQuestion($match, $tnfForm);
                    }
                }
            }
        }
    }

    public function checkIfTNF($match): bool
    {
        $dateTime = new \DateTime($match->start_time);
        $dayOfWeek = $dateTime->format('l');
        return $dayOfWeek == 'Thursday' || $dayOfWeek == 'Friday';
    }

    public function createQuestion($match, $form = null, ): void
    {
        if (is_null($form)) {
            $form = new Form();
            $form->week = $match->week. " TNF";
            $form->save();
            $this->createQuestion($match, $form);
        } else {
            $question = new Question();
            $question->question = "Ki nyeri a mérkőzést?";
            $question->nfl_match_id = $match->id;
            $question->question_type_id = 1;
            $question->form_id = $form->id;
            $question->save();
        }
    }

    public function checkIfTNFAlreadyExistsForWeek($week): Form|null
    {
        $form = Form::where('week', $week)->first();

        return $form;
    }
}
