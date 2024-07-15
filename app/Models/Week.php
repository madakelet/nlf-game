<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function matches()
    {
        return $this->hasMany(NflMatch::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
}
