<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $error = basicValidation($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($error) {
            return response()->json(responseFormatter(422, "Unprocessable Entity", "Validation fails.", $error));
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(responseFormatter(422, "Unprocessable Entity", "The provided credentials are incorrect.", ['email' => ['The provided credentials are incorrect.'],]));
        }

        return 'test';
    }

    public function test()
    {
        $user = User::first();
        $attendance = Attendance::where('user_id', $user->id)->paginate(20);
        return response()->json(responseFormatter(200, 'OK', 'Success', $attendance));
    }
}
