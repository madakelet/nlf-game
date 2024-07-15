<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NflMatch extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, "home_team_id");
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, "away_team_id");
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
