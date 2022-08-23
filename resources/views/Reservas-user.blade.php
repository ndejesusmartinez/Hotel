@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center"> Mis Reservas</h1>
@endsection

@section('contenido')
<?php
$user = auth()->user()->email;
$data = DB::select("select * from reservas WHERE email = '$user' ");
?>

<div class="table-responsive">
    <div class="card-body">
        <table class="table table-striped table-bordered dt-responsive nowrap">
            <thead class="thead">
                <th class="text-center">N° de reserva</th>
                <th class="text-center">Nombres y apellidos</th>
                <th class="text-center">Tipo y N° de identificacion</th>
                <th class="text-center">Fecha de ingreso</th>
                <th class="text-center">Fecha de salida</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Tipo de habitacion</th>
                <th class="text-center">Estado de la reserva</th>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td class="text-center"> {{ $d->id }} </td>
                    <td class="text-center"> {{ $d->nombres }}  {{ $d->apellido1}} {{ $d->apellido2 }}</td>
                    <td class="text-center"> {{ $d->tipo_id }}  {{ $d->identificacion }}  </td>
                    <td class="text-center"> {{ $d->entrada }} </td>
                    <td class="text-center"> {{ $d->salida }} </td>
                    <td class="text-center"> {{ $d->email }} </td>
                    <td class="text-center"> {{ $d->tel }} </td>
                    <td class="text-center"> {{ $d->tipo_hab }} </td>
                    <td class="text-center"> {{ $d->estado }} </td>
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>


@endsection