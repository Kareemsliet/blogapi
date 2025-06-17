<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        $token = JWTAuth::fromUser($user);

        return successResponse(__("auth.register"), [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function login(LoginRequest $request)
    {
        $request->validated();

        $token = auth("api")->attempt($request->only(["email", "password"]));

        if (!$token) {
            return failResponse(__("auth.failed"));
        }

        return successResponse(__("auth.login"), [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        auth("api")->logout();

        return successResponse(__("auth.logout"));
    }

    public function profile(Request $request)
    {
        $user = auth("api")->user();

        return successResponse(data: $user->toResource(UserResource::class));
    }

}
