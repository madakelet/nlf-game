<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateAutomaticFormRequest;
use App\Http\Requests\ShowFormRequest;
use App\Http\Requests\StoreFormRequest;
use App\Http\Resources\FormResource;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Week;

class FormController extends Controller
{
    public function index()
    {
        return FormResource::collection(Form::orderBy('id', 'asc')->get());
    }

    public function show(ShowFormRequest $showFormRequest)
    {
        $form = Form::find($showFormRequest->id);
        return new FormResource($form);
    }

    public function create(StoreFormRequest $storeFormRequest)
    {
        $form = Form::create([
            'week' => $storeFormRequest->week,
        ]);
        $questions = $storeFormRequest->questions;
        try {
            foreach ($questions as $question) {
                $form->questions()->create($question);
            }
            return new FormResource($form);
        } catch (\Exception $e) {
            $form->delete();
            return response()->json([
                'message' => 'Error creating form',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function generateAutomaticForWeek(GenerateAutomaticFormRequest $request)
    {
        $week = Week::find($request->week_id);
        $matches = $week->matches->sortBy('start_date');
        $form = Form::create([
            'week_id' => $week->id,
            'name' => $week->week,
        ]);

        foreach ($matches as $index => $match) {
            if($index > 1) {
                break;
            }
            $form->questions()->create([
                'question' => 'Ki nyeri a mérkőzést?',
                'question_type_id' => "9c889f7f-3cbf-4bf8-b4a3-05326039fc5c",
                'position' => $index + 1,
                'nfl_match_id' => $match->id,
            ])->questionAnswers()->createMany([
                ['answer' => $match->homeTeam->name],
                ['answer' => $match->awayTeam->name],
            ]);
        }
    }
}
