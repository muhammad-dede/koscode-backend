<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => 'Bad Request',
                'message' => 'Failed',
                'errors' => $validator->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'code' => 401,
                'status' => 'Unauthorized',
                'message' => 'Failed',
                'errors' => ['email' => ['Invalid email']]
            ], 401);
        } else {
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'code' => 401,
                    'status' => 'Unauthorized',
                    'message' => 'Failed',
                    'errors' => ['password' => ['Password salah']]
                ], 401);
            } else {
                $token = $user->createToken('token')->plainTextToken;
                $data = [
                    'token' => $token,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
                return response()->json([
                    'code' => 200,
                    'status' => 'OK',
                    'message' => 'Success',
                    'data' => $data,
                ], 200);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Logout Successfully',
        ], 200);
    }
}
