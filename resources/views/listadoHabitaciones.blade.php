@extends('layout.app')


@section('Titutlo')
@endsection

@section('contenido')
<?php 
$i = 0;
$nombre = DB::select('select * from habitaciones');
?>
    <div class="table-responsive">
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Tipo de habitacion</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nombre as $nom)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td> {{ $nom->HAB_NOMBRE }} </td>
                            <td> {{ $nom->HAB_TIPO }} </td>
                            <td> {{ $nom->HAB_PRECIO }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection