<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowFormRequest;
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
}
