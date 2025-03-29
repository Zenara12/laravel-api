<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $fields =  $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($fields);

        $token = $user->createToken($request->name)->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            abort(404,'Invalid Credentials');
        }
        $token = $user->createToken($user->name)->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return ['message' => 'Logged out'];
    }
}
