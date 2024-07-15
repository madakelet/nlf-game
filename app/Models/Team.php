<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function homeMatches()
    {
        return $this->hasMany(NflMatch::class, "home_team_id");
    }

    public function awayMatches()
    {
        return $this->hasMany(NflMatch::class, "away_team_id");
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, "imageable");
    }
}
