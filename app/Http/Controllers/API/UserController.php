<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private UserServices $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function loginUser(LoginUserRequest $request): Response
    {
        $loginAttempt = $this->userServices->login($request->validated());

        if ($loginAttempt['status'])
            return Response(['user' => $loginAttempt['user'], 'access_token' => $loginAttempt['access_token']],200);

        return Response(['message' => 'email or password wrong'],401);
    }

    /**
     * Display the specified resource.
     */
    public function logout(): Response
    {
        $this->userServices->logout();

        return Response(['message' => 'User Logout successfully.'],200);
    }
}
