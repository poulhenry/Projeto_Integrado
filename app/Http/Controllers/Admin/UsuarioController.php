<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function cadastrar(Request $request)
    {
        if ($request->method() == "GET") {
            return view("admin.usuarios.cadastrar");
        }
        $usuario = new User();
        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->nivel = 1;
        if ($request->status == "on") {
            $usuario->status = 1;
        }else{
            $usuario->status = 0;
        }
        $usuario->cidade = $request->cidade;
        $usuario->estado = $request->estado;
        $usuario->cep = $request->cep;
        $usuario->endereco = $request->endereco;
        $usuario->numero = $request->numero;
        $usuario->complemento = $request->complemento;
        $usuario->password = Hash::make($request->senha);
        if (!empty($usuario->save())) {
            return back()->with("ok", "Usuário cadastrado com sucesso.");
        }
        return back()->with("erro", "Não foi possível cadastrar este usuário.");
    }

    public function listar(Request $request)
    {
        $usuarios = User::where("nivel", 1)->get();

        return view("admin.usuarios.listar", ["usuarios" => $usuarios]);
    }

    public function usuario($id)
    {

        $usuario = User::find($id);

        if (empty($usuario)) {
            return back()->with("erro", "Usuário não encontrado");
        }
        return view("admin.usuarios.index", ["usuario" => $usuario]);
    }

    public function alterar($id, Request $request){
        $usuario = User::find($id);

        if(empty($usuario)){
            return back()->with("erro","Usuário inválido");
        }

        $count = 0;

        if($request->nome != $usuario->name){
            $usuario->name = $request->name;
            $count++;
        }

        if($request->email != $usuario->email){
            $usuario->email = $request->email;
            $count++;
        }

        if(!empty($request->senha)){
            $usuario->password = Hash::make($request->senha);
            $count++;
        }

        if($request->estado != $usuario->estado){
            $usuario->estado = $request->estado;
            $count++;
        }

        if($request->cidade != $usuario->cidade){
            $usuario->cidade = $request->cidade;
            $count++;
        }

        if($request->cep != $usuario->cep){
            $usuario->cep = $request->cep;
            $count++;
        }

        if($request->bairro != $usuario->bairro){
            $usuario->bairro = $request->bairro;
            $count++;
        }

        if($request->endereco != $usuario->endereco){
            $usuario->endereco = $request->endereco;
            $count++;
        }

        if($request->numero != $usuario->numero){
            $usuario->numero = $request->numero;
            $count++;
        }

        if($request->complemento != $usuario->complemento){
            $usuario->complemento = $request->complemento;
            $count++;
        }


        if(empty($count)){
            return back()->with("erro","Nada para alterar");
        }

        if(!empty($usuario->save())){
            return back()->with("ok","Usuário cadastrado com sucesso");
        }

        return back()->with("erro","Não foi possível alterar este usuario");
    }

    public function desativar(Request $request)
    {
        $usuario = User::find($request->usuario_id);

        if (empty($usuario)) {
            return response()->json(["status" => 0, "erro" => "Usuário não encontrado"]);
        }

        $usuario->status = 0;
        if (!empty($usuario->save())) {
            return response()->json(["status" => 1]);
        }
        return response()->json(["status" => 0, "erro" => "Não foi possível desativar este usuário."]);
    }

    public function ativar(Request $request)
    {
        $usuario = User::find($request->usuario_id);

        if (empty($usuario)) {
            return response()->json(["status" => 0, "erro" => "Usuário não encontrado"]);
        }

        $usuario->status = 1;
        if (!empty($usuario->save())) {
            return response()->json(["status" => 1]);
        }
        return response()->json(["status" => 0, "erro" => "Não foi possível ativar este usuário."]);
    }
}
