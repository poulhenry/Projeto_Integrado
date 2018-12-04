<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'usuario' => 'required|string',
            'senha' => 'required|string',
        ]);
        try{

            $admin = Admin::where("usuario",$request->usuario)
                ->where("status",1)->first();
            if(empty($admin))
                return back()->with("erro","Usuário ou senha inválido.");

            if(Hash::check($request->senha,$admin->senha)){
                Auth::guard("admin")->login($admin);
                return redirect('/admin/dashboard');
            }

        }catch (\Exception $e){
                return back()->with("erro","Ocorreu um erro inesperado: ".$e->getMessage());
        }
    }

    public function view(){
        return view('admin.auth.login');
    }

    public function sair(){
        Auth::logout();
    }
}
