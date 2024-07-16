<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;
use App\Models\NflMatch;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            "week_id" => "required|exists:weeks,id",
        ]);
        $weekId = $validated["week_id"];
        return MatchResource::collection(
            NflMatch::where("week_id", $weekId)
                ->orderBy("start_time", "asc")
                ->get()
        );
    }
}
