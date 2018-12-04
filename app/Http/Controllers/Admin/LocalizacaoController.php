<?php

namespace App\Http\Controllers\Admin;

use App\Localizacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalizacaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {

    }

    public function alterar($id,Request $request)
    {
        $localizacao = Localizacao::find($id);

        if (empty($localizacao)) {
            return response()->json(["status" => 0, "erro" => "Não foi possível encontrar esta localização"]);
        }

        $count = 0;

        if ($localizacao->endereco != $request->endereco) {
            $localizacao->endereco = $request->endereco;
            $count++;
        }
        if ($request->status) {
            if ($request->status == "on" && $localizacao->status == 0) {
                $localizacao->status = 1;
                $count++;
            } else if ($request->status == "off" && $localizacao->status == 1) {
                $localizacao->status = 0;
                $count++;
            }
        }
        if ($localizacao->numero != $request->numero) {

            $localizacao->numero = $request->numero;
            $count++;
        }
        if ($localizacao->cep != $request->cep) {

            $localizacao->cep = $request->cep;
            $count++;
        }
        if ($localizacao->bairro != $request->bairro) {

            $localizacao->bairro = $request->bairro;
            $count++;
        }
        if ($localizacao->cidade != $request->cidade) {

            $localizacao->cidade = $request->cidade;
            $count++;
        }
        if ($localizacao->estado != $request->estado) {

            $localizacao->estado = $request->estado;
            $count++;
        }
        if ($localizacao->cidade != $request->complemento) {

            $localizacao->cidade = $request->cidade;
            $count++;
        }

        if (!empty($localizacao->update())) {
            return back()->with("ok","Alteração realizado com sucesso.");
        }

            return back()->with("erro","Não foi possível alterar esta localizacao.");
    }


    public function cadastrar(Request $request)
    {
        if ($request->method() == "GET") {
            return view("admin.localizacao.cadastrar");
        }
        $localizacao = new Localizacao();
        $localizacao->endereco = $request->endereco;
        if (!empty($request->status) && $request->status == "on") {
            $localizacao->status = 1;
        } else {
            $localizacao->status = 0;
        }
        $localizacao->numero = $request->numero;
        $localizacao->complemento = $request->complemento;
        $localizacao->cep = $request->cep;
        $localizacao->endereco = $request->endereco;
        $localizacao->cidade = $request->cidade;
        $localizacao->pais = $request->pais;
        $localizacao->estado = $request->estado;
        $localizacao->bairro = $request->bairro;

        if (!empty($localizacao->save())) {
            return back()->with("ok", "Localização cadastrada com sucesso.");
        }
        return back()->with("ok", "Não foi possível cadastrar esta localização.");
    }

    public function desativar($id)
    {
        $localizacao = Localizacao::find($id);
        if (empty($localizacao)) {
            return back()->with("erro", "Não foi possível encontrar esta localização");
        }

        $localizacao->status = 0;
        if (!empty($localizacao->save())) {
            return back()->with("ok", "Localização desativada com sucesso.");
        }
        return back()->with("erro", "Não foi possível desativar esta localização.");
    }

    public function ativar($id)
    {
        $localizacao = Localizacao::find($id);
        if (empty($localizacao)) {
            return back()->with("erro", "Não foi possível encontrar esta localização");
        }

        $localizacao->status = 0;
        if (!empty($localizacao->save())) {
            return back()->with("ok", "Localização desativada com sucesso.");
        }
        return back()->with("erro", "Não foi possível desativar esta localização.");
    }


    public function localizacao($id)
    {

        $localizacao = Localizacao::find($id);

        if (empty($localizacao)) {
            return back()->with("erro", "Não foi possível encontrar esta localização");
        }

        return view("admin.localizacao.index", ["localizacao" => $localizacao]);
    }

    public function listar(Request $request)
    {
        $localizacoes = Localizacao::all();

        return view("admin.localizacao.listar", ["localizacoes" => $localizacoes]);
    }

    public function pendetes(Request $request)
    {
        $localizacoes = Localizacao::where("status", 0)->get();

        return view("admin.localizacao.listar", ["localizacoes" => $localizacoes]);
    }

    public function listarPendentes(Request $request)
    {
        $localizacoes = Localizacao::where("status", 0)->get();

        return response()->json(["status" => 1, "localizacoes" => $localizacoes]);
    }
}
