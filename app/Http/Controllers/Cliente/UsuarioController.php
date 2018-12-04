<?php

namespace App\Http\Controllers\Cliente;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function cadastrar(Request $request)
    {

        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->nivel = 1;
        $user->status = 1;
        $user->password = Hash::make($request->senha);

        $retorno = $user->save();

        if (!empty($retorno)) {
            return response()->json(["status" => 1]);
        }
        return response()->json(["status" => 0]);
    }
}
