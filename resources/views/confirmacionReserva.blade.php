@extends('layout.app')



@section('Titutlo')
    <h2 class="text-center">Reserva Exitosa</h2>
@endsection

@section('contenido')

    <h1 class="text-center">
        Datos de la reserva
    </h1>
    <div class="container text-center">
        <?php 
                $ii = DB::select("select id  from reservas WHERE email = '$email' and tipo_hab = '$tipo_hab' and estado = 'S' ");  
            ?>
        <div class="mb-3 mt-3">
            <label for="">Id:</label>
            <label for="">
                @foreach ($ii as $n)
                {{ $n->id }}
                @endforeach
            </label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Nombre:</label>
            <label for=""> {{ $nombres }}</label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Apellidos:</label>
            <label for=""> {{ $apellido1 }} {{ $apellido2 }}</label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Correo:</label>
            <label for=""> {{ $email }}</label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Tipo de Identificacion:</label>
            <label for=""> {{ $tipo_id }}</label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Telefono:</label>
            <label for=""> {{ $tel }}</label>
        </div>
        <div class="mb-3 mt-3">
            <label for="">Habitacion:</label>
            <label for=""> {{ $tipo_hab  }}</label>
        </div>
    </div>
@endsection


<script>
    alert('Reserva Agregada satisfactoriamente')
</script>


