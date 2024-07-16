<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Http\Requests\DeleteInvitationRequest;

class InvitationController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "email" => "required|email",
        ]);
        $invitation = Invitation::create([
            "email" => $request->email,
            "token" => Str::random(32),
            "expires_at" => now()->addDays(10),
        ]);

        try {
            $this->sendInvitation($invitation);
            return $invitation;
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 404);
        }
    }

    public function sendInvitation($invitation)
    {
        $url =
            env("APP_URL") .
            "/register?token=" .
            $invitation->token .
            "&email=" .
            $invitation->email;
        Mail::to($invitation->email)->send(new InvitationMail($url));
    }

    public function index()
    {
        return Invitation::all();
    }

    public function delete(DeleteInvitationRequest $request)
    {
        $invitation = Invitation::where("id", $request->id)->first();
        try {
            $invitation->delete();
            return response()->json(["message" => "Invitation deleted"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 404);
        }
    }
}
