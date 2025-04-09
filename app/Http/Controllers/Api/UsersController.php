<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsersController extends Controller
{
    public function create()
    {
        // logika create di sini
        return response()->json(['message' => 'Create akun berhasil']);
    }

    public function me()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            return response()->json([
                'user' => $user
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token tidak valid atau kadaluarsa'], 401);
        }
    }
    
}
