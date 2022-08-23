@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center">Crear usuario</h1>
@endsection

@section('contenido')
<div class="m-0 row justify-content-center pt-4 mb-4">
    <div class="col-auto w-50 text-center ">
        <h1>Datos del usuario</h1>
        <form action="{{route('addUsuario')}}" method="post">
            @csrf
            <div class="from-group mt-4">
                <label class="text-center" for="">Nombre de usuario</label>
                <input class="form-control text-center" type="text" name="username" id="" placeholder="Username">
            </div>

            <div class="from-group mt-4">
                <label class="text-center" for="">Contraseña</label>
                <input class="form-control text-center" type="password" name="password" id="" placeholder="">
            </div>

            <div class="from-group mt-4">
                <label class="text-center" for="">Correo electronico</label>
                <input class="form-control text-center" type="email" name="email" id="" placeholder="Correo electronico">
            </div>

            <div class="mt-4">
                <button onclick="" class="btn btn-primary" type="submit">
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


