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

    public function getUser(Request $request)
    {
        $user = $request->attributes->get('user');

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }

        return response()->json($user);
    }





    // Register methode ****
    public function register(UserRegisterRequest $request)
    {
        $dataValidated = $request->validated();
        $user = User::create($dataValidated);

        // crèe une token  á l‘aide de Jwt
        $token = JWTAuth::fromUser($user);

        return response()->json([
<<<<<<< HEAD
            'message' => "regsiter  créé avec succès",
=======
            'message' => "regsiter créé avec succès",
>>>>>>> 83ef6286291e95009974f9c3e35977872ef521cd
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
<<<<<<< HEAD
        if (!$user  ||  !Hash::check($dataValidated["password"], $user->password)) {
=======
        if (!$user) {
>>>>>>> 83ef6286291e95009974f9c3e35977872ef521cd
            return response()->json([
                'errors' => [
                    "email" => 'email or password incorcet'
                ]
            ], 404);
        } // block de password
<<<<<<< HEAD
        // elseif(!Hash::check($dataValidated["password"],$user->password)){
        //     return response()->json([
        //         'errors'=>[
        //             "email"=>"email or password incorcet" 
        //         ]
        //     ],404);
        // }

        // il obliger de crèe une nevaux token 
=======
        elseif (!Hash::check($dataValidated["password"], $user->password)) {
            return response()->json([
                'errors' => [
                    "email" => "email or password incorcet"
                ]
            ], 404); // 401 == non autorisè
        }
        // il obliger de crèe une nevaux token
>>>>>>> 83ef6286291e95009974f9c3e35977872ef521cd
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => "login  créé avec succès",
            'user' => $user,
            'token' => $token
        ], 200); // 201  == response rèussie
    }
}
