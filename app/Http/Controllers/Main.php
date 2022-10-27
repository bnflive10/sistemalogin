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
        if($this->checkSession()){
            return redirect()->route('home');
        }else{
            return redirect()->route('login');
        }
    }

    public function login(){
        // verifica se existe login
        if ($this->checkSession()) {
            return redirect()->route('index');
        }


        //apresenta o formulario de login

        $erro = session('erro');
        $data = [];

        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }

        return view('login',$data);
    }

    public function login_submit(FrmLoginRequest $request){
        
        //se houve uma submissao de formulario
        if(!request()->method('post')){
            return redirect()->route('index');
        }
        // se existe um usuario na sessao
        if($this->checkSession()){
            return redirect()->route('index');
        }


        //validacao
        $request->validated();
        //verificar dados de login
        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario = Usuario::where('usuario',$usuario)->first();

        //verifica se usuario existe
        if(!$usuario){
            // se nao existe
            /* 
                a)registrar um erro (usuario nao existe)
                b)passar essa informacao prara o formulario de login
                c) voltar ao formulario de login e apresentar o erro
            */
            session()->flash('erro',['usuario nao existe']);
            return redirect()->back();
        }

        //verifivar senha
        if(!Hash::check($senha, $usuario->senha)){
            echo 'Usuario ou senha errada'; 
            return;
        }


        //login 'e valido
        session()->put('usuario', $usuario);
        return redirect()->route('index');
        

        //criar a sessao se login ok
    }

    private function checkSession(){

        return session()->has('usuario');
    }

    public function temp(){
       
        $usuario = new Usuario;
        $usuario->usuario = 'bnflive10@gmail.com';
        $usuario->senha = Hash::make('bnf123');
        $usuario->save();
        echo 'terminado';
    }

    public function home(){

        if(!$this->checkSession()){
            return redirect()->route('index');
        }
        return view('home');
    }
}
