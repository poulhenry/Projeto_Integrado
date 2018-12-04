<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function cadastrarView()
    {
        return view('admin.administrador.cadastrar');
    }

    public function cadastrar(Request $request)
    {

        try {
            $this->validate(request(), [
                'nome' => 'required',
                'email' => 'required|email|unique:admins',
                'usuario' => 'required|email|unique:admins',
                'senha' => 'required|min:6'
            ]);
        } catch (ValidationException $e) {
        }

        $user = new Admin();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->usuario = $request->usuario;

        if (!empty($request->status) && $request->status == "on") {
            $user->status = 1;
        } else {
            $user->status = 0;
        }
        $user->senha = Hash::make($request->senha);

        $retorno = $user->save();

        if (!empty($retorno)) {
            return back()->with("ok", "Administrador registrado com sucesso.");
        }
        return back()->with("erro", "Não foi possível cadastrar este Administrador.");
    }

    public function alterar(Request $request)
    {
        $admin = Admin::find($request->usuario_id);
        if (empty($admin)) {
            return response()->json(["status" => 0, "erro" => "Administrador inválido"]);
        }
        $count = 0;
        if ($admin->name != $request->nome) {
            $admin->name = $request->nome;
            $count++;
        }

        if ($admin->email != $request->email) {
            $count++;

        }
        if ($admin->nivel != $request->nivel) {
            $admin->nivel = $request->nivel;
            $count++;
        }
        if ($admin->email != $request->email) {
            $admin->email = $request->email;
            $count++;
        }
        if (empty(Hash::check($request->senha, $admin->password))) {
            $admin->password = Hash::make($request->senha);
            $count++;
        }
        if ($admin->status != $request->status) {
            $admin->status = $request->status;
            $count++;
        }

        if (!empty($count)) {
            $retorno = $admin->save();
            if (!empty($retorno)) {
                return response()->json(["status" => 1]);
            } else {
                return response()->json(["status" => 0, "erro" => "Não foi possível alterar este administrador"]);
            }
        }
        return response()->json(["status" => 0, "erro" => "Nenhum campo foi preenchido."]);

    }

    public function ativar(Request $request)
    {
        $admin = User::find($request->usuario_id);
        if (empty($admin)) {
            return response()->json(["status" => 0, "erro" => "Usuário inválido"]);
        }

        $admin->status = 1;

        $retorno = $admin->save();

        if (!empty($retorno)) {
            return response()->json(["status" => 1]);
        }
        return response()->json(["status" => 0, "erro" => "Não foi possível ativar este usuário."]);

    }

    public function desativar(Request $request)
    {
        $admin = User::find($request->usuario_id);
        if (empty($admin)) {
            return response()->json(["status" => 0, "erro" => "Usuário inválido"]);
        }


        $admin->status = 0;

        $retorno = $admin->save();

        if (!empty($retorno)) {
            return response()->json(["status" => 1]);
        }
        return response()->json(["status" => 0, "erro" => "Não foi possível desativar este usuário."]);

    }

    public function admin($id)
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return response()->with('erro', 'Usuário inválido.');
        }

        return view('admin.administrador.admin', ['admin' => $admin]);
    }

    public function listar(Request $request)
    {
        $admins = Admin::all();

        return view('admin.administrador.listar',["admins" => $admins]);
    }
}
