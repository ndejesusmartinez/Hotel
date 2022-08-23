@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center">
        Perfil de usuario
    </h1>
@endsection

@section('contenido')
    <?php 
    $user = auth()->user()->username;
    $data = DB::select("select * from users WHERE username = '$user' ");
    ?>
    @foreach ($data as $d)
    <div class="table-responsive">
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead">
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Correo electronico</th>
                    <th class="text-center">Rol</th>
                </thead>
                <tbody>
                    <td class="text-center"> {{ $d->username }} </td>
                    <td class="text-center"> {{ $d->email }} </td>
                    <td class="text-center"> {{ $d->rol }} </td>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
@endsection