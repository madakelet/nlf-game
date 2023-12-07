<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function isAdmin(Request $request)
    {
        if($request->user()['is_admin'] === 1) {
            return response()->json(true, 200);
        } else {
            return response()->json(false, 500);
        }
    }
}
