<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => "all users rècupèrer   avec succès",
            "users" => $users
        ], 200);
    }




    // Register methode ****
    public function register(UserRegisterRequest $request)
    {
        $dataValidated = $request->validated();
        $user = User::create($dataValidated);

        // crèe une token  á l‘aide de Jwt
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => "regsiter créé avec succès",
            'user' => $user,
            'token' => $token
        ], 201); // 201  sginifier la creation
    }



    // login methode ****
    public function login(UserLoginRequest $request)
    {
        $dataValidated = $request->validated();

        $user = User::where('email', $dataValidated["email"])->first();

        // ce block pour les erreurs de login method


        // email incorecte
        if (!$user) {
            return response()->json([
                'errors' => [
                    "email" => 'email or password incorcet'
                ]
            ], 404);
        } // block de password
        elseif (!Hash::check($dataValidated["password"], $user->password)) {
            return response()->json([
                'errors' => [
                    "email" => "email or password incorcet"
                ]
            ], 404); // 401 == non autorisè
        }
        // il obliger de crèe une nevaux token
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => "login  créé avec succès",
            'user' => $user,
            'token' => $token
        ], 200); // 201  == response rèussie
    }
}
