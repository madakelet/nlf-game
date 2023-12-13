<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowFormRequest;
use App\Http\Requests\StoreFormRequest;
use App\Http\Resources\FormResource;
use Illuminate\Http\Request;
use App\Models\Form;

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
        }
        catch (\Exception $e) {
            $form->delete();
            return response()->json([
                'message' => 'Error creating form',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
