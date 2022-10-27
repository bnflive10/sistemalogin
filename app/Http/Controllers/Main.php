<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrmLoginRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{
    //

    public function index(){
        //verifica se o usuario esta logado
        if(session()->has('usuario')){
            echo 'Logado';
        }else{
            return redirect()->route('login');
        }
    }

    public function login(){
        return view('login');
    }

    public function login_submit(FrmLoginRequest $request){
        //validacao

        //verificar dados de login
        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario = Usuario::where('usuario',$usuario)->first();

        if($usuario){
            echo 'Ok!';
        }else{
            echo 'NOK';
        }

        //criar a sessao se login ok
    }

    public function temp(){
       
        $usuario = new Usuario;
        $usuario->usuario = 'bnflive10@gmail.com';
        $usuario->senha = Hash::make('bnf123');
        $usuario->save();
        echo 'terminado';
    }
}
