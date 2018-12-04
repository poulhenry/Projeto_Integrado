<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        try{

            $credentials = request(['email', 'password']);
            if(!Auth::attempt($credentials))
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);

            $user = $request->user();
            $tokenResult = $user->createToken('bike-park');


            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
                "usuario" => $user
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => "0",
                'message' => $e->getMessage()
            ]);
        }
    }
}
