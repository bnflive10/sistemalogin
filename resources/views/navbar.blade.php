<div class="container-fluid bg-dark p-3 text-white">
    <div class="row ">
        <div class="col">[APLICACAO]</div>
        <div class="col text-end">{{session('usuario')['usuario']}} | <a href="{{route('logout')}}">Logout</a></div>
    </div>
</div>