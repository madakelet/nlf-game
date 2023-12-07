<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Week;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    public function index()
    {
        return Week::orderBy('is_current', 'desc')->orderBy('start_date', 'asc')->get();
    }
}
