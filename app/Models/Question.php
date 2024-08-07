<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Question extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = [];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function nflMatch()
    {
        return $this->belongsTo(NflMatch::class);
    }

    public function questionAnswers()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
