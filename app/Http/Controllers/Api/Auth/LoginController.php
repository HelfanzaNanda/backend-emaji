<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:sanctum')->only('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'message' => 'login successfully',
            'status' => true,
            'data' => UserResource::make($user)
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $response = [
            'message' => 'logout successfully',
            'status' => true,
            'data' => (object)[]
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
