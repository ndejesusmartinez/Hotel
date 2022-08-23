@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center"> Cambio de contraseña </h1>
@endsection


@section('contenido')
<div class="m-0 row justify-content-center pt-4 mb-4">
    <div class="col-auto w-50 text-center ">
        <form action="{{ route('newPassword') }}" method="POST">
            @csrf
                @if(session('mensaje'))
                    <p>{{session('mensaje')}}</p>
                @endif
            <div class="from-group mt-4">
                <p>{{ $email }}</p>
                <label for="" class="m-4">Contraseña</label>
                <input type="text" name="email" id="" value="{{ $email }}" >
                <input class="form-control m-4" type="password" name="newP" placeholder="Ingresa tu contraseña">
                <button class="btn btn-secondary m-4">Cambiar contraseña</button>
            </div>
        </form>
    </div>
</div>
@endsection