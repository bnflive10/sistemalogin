@extends('layouts.login_layout');

@section('content')


<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4  offset-sm-4">
            <form action="{{route('login_submit')}}" method="post">
                @csrf
                <h4>Login</h4>
                <hr>
                <div class="mb-3">
                    <label class="form-label">Usuario:</label>
                    <input type="email" name="text_usuario" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha:</label>
                    <input type="password" name="text_senha" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </div>
            </form>
            {{-- erros de validacao --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    
                </div>
            
                
            @endif

            {{-- erros de login --}}
                @if (isset($erro))
                @foreach ($erro as $mensagem)
                <div class="alert alert-danger text-center">
                    <p>{{$mensagem}}</p>
                </div>
                @endforeach
                    
                @endif
        </div>
    </div>
    
</div>

@endsection