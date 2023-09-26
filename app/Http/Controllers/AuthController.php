<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => decrypt($request->password)])) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
        } else {
            return response()->json(['message' => 'Invalid credentials666'], 401);
        }
    }

}
