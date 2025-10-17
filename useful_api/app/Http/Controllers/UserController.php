<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

       /* $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            return response()->json(['message' => 'email already exist'], 200);
        }*/
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'user created suceesfully',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //$request->session()->regenerate();
            $token = $user->createToken(
                'usertoken',
            )->plainTextToken;
            return response()->json([
                'token' => $token,
                'user_id' => $user->id
            ]);
        } else {
            return response()->json([
                'message' => 'Identifiants invalides'
            ], 401);
        }
    }
}
