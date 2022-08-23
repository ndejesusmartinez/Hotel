@extends('layout.app')

@section('titulo')

@endsection


@section('contenido')
<div class="m-0 row justify-content-center pt-4 mb-4">
    @csrf
    @if(session('mensaje'))
    <h3 class="text-center">{{session('mensaje')}}</h3>
    @endif
    <div class="col-auto w-50 text-center ">
        <h1>Datos de la habitacion</h1>
        <form action="{{route('addHabitacion')}}" method="post">
            @csrf
            <div class="from-group mt-4">
                <label class="text-center" for="">Nombre de la habitacion</label>
                <input class="form-control text-center" type="text" name="hab_nombre" id="" placeholder="Nombre de la habitacion">
            </div>

            <div class="from-group mt-4">
                <label for="">Tipo de habitacion</label>
                <select class="form-control text-center" name="hab_tipo" id="">
                    <option  value="">Seleccione un tipo de habitacion</option>
                    <option  value="Sencilla">Sencilla</option>
                    <option  value="Doble">Doble</option>
                    <option  value="Multiple">Multiple</option>
                </select>
            </div>

            <div class="from-group mt-4">
                <label class="text-center" for="">Precio de la habitacion</label>
                <input class="form-control text-center  " type="text" name="hab_precio" id="" placeholder="Precio de la habitacion">
            </div>

            <div class="mt-4">
                <button onclick="ss();" class="btn btn-primary" type="submit">
                    Agregar Habitacion
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function ss(){
        alert('Habitacion agregada')
    }
</script>