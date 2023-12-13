<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function isAdmin(Request $request)
    {
        if ($request->user()['is_admin'] === 1) {
            return response()->json(true, 200);
        } else {
            return response()->json(false, 500);
        }
    }

    public function register(RegisterUserRequest $registerUserRequest)
    {
        $user = new User();
        $user->name = $registerUserRequest->name;
        $user->email = $registerUserRequest->email;
        $user->password = Hash::make($registerUserRequest->password);
        $user->team_id = $registerUserRequest->team_id;

        try {
            $this->deleteInvitation($registerUserRequest->email);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }

        $user->save();
        $user->markEmailAsVerified();
        
        return $user;
    }

    public function deleteInvitation($email)
    {
        $invitation = Invitation::where('email', $email)->first();
        $invitation->delete();
    }

    public function index()
    {
        return UserResource::collection(User::all());
    }

}
