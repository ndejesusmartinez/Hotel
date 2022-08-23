@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center">Login</h1>
@endsection

@section('contenido')
    <div class="container">
        <div class="row vh-50 justify-content-center align-items-center pb-4 pt-4">
            <div class="col-auto p-5 text-center bg-white rounded-lg shadow">
                <form class="mb-3" action="{{route('iniciarSesion')}}" method="post">
                    @csrf
                    @if(session('mensaje'))
                        <p>{{session('mensaje')}}</p>
                    @endif
                    <div class="mb-3 mt-3">
                        <label for="userName" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario" name="username" required>
                        <div class="valid-feedback">Aceptado.</div>
                        <div class="invalid-feedback">Por favor ingrese su nombre para continuar.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" name="password" required>
                        <div class="valid-feedback">Aceptado.</div>
                        <div class="invalid-feedback">Por favor ingrese su contraseña para continuar.</div>
                      </div>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
                <div class="container">
                    <a class="btn btn-success" onclick="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal"> Olvidé mi contraseña</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center" id="hab3">
            <h4 class="text-center">
                Ingresa tu correo electronico
            </h4>
        </div>
        <form class="m-4" action="{{ route('emailChangePassword') }}" method="get">
            <input class="form-control" type="email" name="emailD" placeholder="Ingresa tu correo electronico" >
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger m-4 " type="submit">Enviar correo</button>
            </div>
        </form>
      </div>
    </div>
</div>
