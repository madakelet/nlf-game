<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function correctAnswer()
    {
        return $this->hasOne(CorrectAnswers::class);
    }

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function userResponses()
    {
        return $this->hasMany(UserResponse::class);
    }

    public function nflMatch()
    {
        return $this->belongsTo(NflMatch::class);
    }
}
