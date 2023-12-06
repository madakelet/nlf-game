<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'week' => $this->week,
            'home_team' => TeamResource::make($this->homeTeam),
            'away_team' => TeamResource::make($this->awayTeam),
            'start_time' => $this->start_time,
            'stadium' => $this->stadium,
        ];
    }
}
