@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center"> Lista de reservas </h1>
@endsection


@section('contenido')
<div class="container d-flex justify-content-end">
    <a href="{{ route('excel') }}" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
        </svg>
        Descargar reporte
    </a>
</div>
<?php 
$i = 0;
$nombre = DB::select('select * from reservas');
?>
    <div class="table-responsive">
        @csrf
        @if(session('mensaje2'))
        <h3 class="text-center">{{session('mensaje2')}}</h3>
        @endif
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center"> Id Reserva </th>
                        <th class="text-center">Nombres y apellidos</th>
                        <th class="text-center">Identificacion</th>
                        <th class="text-center">Ingreso y salida</th>
                        <th class="text-center">Email</th>
                        <th class="text-center" >Habitacion</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nombre as $nom)
                        <tr>
                            <td class="text-center align-middle">{{ ++$i }}</td>
                            <td class="text-center align-middle">{{ $nom->id }}</td>
                            <td class="text-center align-middle"> {{ $nom->nombres }} {{ $nom->apellido1 }} {{ $nom->apellido2 }}</td>
                            <td class="text-center align-middle"> {{ $nom->identificacion }} </td>
                            <td class="text-center align-middle"> Entrada:{{ $nom->entrada }}  ||  Salida:{{ $nom->salida }} </td>
                            <td class="text-center align-middle"> {{ $nom->email }} </td>
                            <td class="text-center align-middle"> {{ $nom->tipo_hab }} </td>
                            <td class="text-center align-middle" >
                                <?php
                                    $estado = $nom->estado; 
                                    if($estado == 'N'){
                                        echo('Inactivo');
                                    }elseif ($estado == 'S') {
                                        echo('Activo');
                                    }else{
                                        echo($estado);
                                    }
                                ?>
                            </td>
                            <td class="text-center align-middle"> 
                                <form action=" {{ route('cancelarReserva',$nom->id) }}" method="get">
                                <button class="btn btn-danger" value='{{ $nom->id }}'   type="submit"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                    </svg>
                                    Cancelar
                                </button> 
                                </form>
                                <form action=" {{ route('finalizarReserva',$nom->id) }} " method="get">
                                <button class="btn btn-success" href=""> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                    </svg>
                                    Finalizar
                                </button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection