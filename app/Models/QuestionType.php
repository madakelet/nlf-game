<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
