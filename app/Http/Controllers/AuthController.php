<?php
namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function generateApiToken(User $user)
    {
        $token = $user->createToken('api_token')->plainTextToken;
        return response(['api_token' => $token], 200);
    }
}
