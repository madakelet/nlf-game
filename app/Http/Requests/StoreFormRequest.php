<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'week' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.question_type_id' => 'required|exists:question_types,id',
            'questions.*.nfl_match_id' => 'nullable|exists:nfl_matches,id',    
        ];
    }
}
