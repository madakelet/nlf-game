<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
