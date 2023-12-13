<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

class InvitationController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => Str::random(32),
            'expires_at' => now()->addDays(10),
        ]);

        try {
            $this->sendInvitation($invitation);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }

    }

    public function sendInvitation($invitation)
    {
        $url = env('APP_URL') . '/register?token=' . $invitation->token . '&email=' . $invitation->email;
        Mail::to($invitation->email)->send(new InvitationMail($url));
    }

    public function index()
    {
        return Invitation::all();
    }
}
