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
            'week' => 'required|regex:/^Week [0-9]+$/'
        ]);
        $week =  $validated['week'];
        return MatchResource::collection(NflMatch::where('week', $week)->orderBy('start_time', 'asc')->get());
    }
}
