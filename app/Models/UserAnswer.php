<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "response_id",
        "question_id",
        "question_answer_id",
        "answer",
    ];

    public function response()
    {
        return $this->belongsTo(Response::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function questionAnswer()
    {
        return $this->belongsTo(QuestionAnswer::class);
    }
}
