<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $email = $request->email;
        $password = hash('sha256', $request->password);
        $user = User::where('email', $email)->where('password', $password)->first();

        if ($user) {
            return response()->json([
                "success" => true,
                "user" => $user->id,
                "name" => $user->name,
            ]);
        } else {
            return response()->json([
                "success" => false,
            ]);
        }
    }


    public function user_data(Request $request)
    {

        $data = Person::where('id', $request->user_id)->first();


        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function sendResponse($data, $message)
    {

        $response = [
            'message' => $message,
            'data' => $data

        ];
        return response()->json($response);
    }
}
