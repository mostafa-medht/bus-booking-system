<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserServices
{
    public function login($validateData): array
    {
        try {
            if(Auth::attempt($validateData)){

                $user = Auth::user();

                $token =  $user->createToken('MyApp')->plainTextToken;

                Log::info("User Login : User with email {$validateData['email']} logged in successfully.");

                return ['status' => true, 'user' => $user, 'access_token' => $token];
            }

            Log::error("User Login : User with email {$validateData['email']} failed to login.");

            return ['status' => false];

        }catch (\Throwable $exception){
            Log::error("User Login : User with email {$validateData['email']} failed to login, ".$exception->getMessage());

            return ['status' => false];
        }
    }

    public function logout(): void
    {
        try {
            $user = Auth::user();

            $user->currentAccessToken()->delete();

            Log::info("User Logout : User with email {$user->email} logged in successfully.");

        }catch (\Throwable $exception){
            Log::error("User Logout : User with email {$user->email} failed to logout, ".$exception->getMessage());
        }
    }
}
