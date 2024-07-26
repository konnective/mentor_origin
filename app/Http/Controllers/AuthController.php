<?php

namespace App\Http\Controllers;

use App\Models\Creds;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    //
    public function pass(Request $request)
    {
        $password = hash("sha256", $request->password);
        $auth_check = User::where('email', 'kunj@gmail.com')->where('password', $password)->first();
        $data = Creds::get();

        if ($auth_check) {

            return response()->json([
                'success' => true,
                'message' => 'List Data',
                'data' => $data
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'no data',

            ], 201);
        }
    }

    public function add_pass(Request $request)
    {
        $input['name'] = $request->name;
        $input['string'] = $request->string;

        Creds::insert($input);

        $data = Creds::get();
        //response
        return response()->json([
            'success' => true,
            'message' => 'added',
            'data' => $data,
        ], 201);
    }
}
