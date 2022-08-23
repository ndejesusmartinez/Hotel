@extends('layout.app')


@section('Titutlo')
<div class="container">
    <h1 class="text-center mt-1">
        LISTADO DE HABITACIONES 
    </h1>
</div>
@endsection

@section('contenido')
<?php 
$i = 0;
$data = DB::select('select * from habitaciones');
?>

<div class="container mb-4 mt-4">
    <div class="row ">
      @foreach ($data as $d)
      <div class="col-sm text-center " style="background-color:rgb(224, 223, 223)">
        <h4>{{ $d->HAB_NOMBRE }}</h4>
        <img class="" src="{{ $d->ruta }}" alt="">
        <div class="">
            <label for="">Descripcion</label>
            <p>Cama doble, baño interno, climatizado</p>
            <p>valor $: {{ $d->HAB_PRECIO }} COP por noche</p>
            <button id="seleccionar" onclick="obtener('ids','{{$d->HAB_NOMBRE}}','{{$d->HAB_PRECIO}}','{{ $d->HAB_TIPO }}');" type="button" class="btn btn-success form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Realizar reserva</button>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Elige la habitacion de tu gusto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="m-0 row justify-content-center pt-4 mb-4">
          <div class="col-auto w-50 text-center ">
              <h1>Datos de tu reserva</h1>
              <form action="{{route('addReserva')}}" method="post">
                @csrf
                  <div class="from-group mt-4">
                      <label class="text-center" for="">Nombre</label>
                      <input class="form-control" type="text" name="" id="" placeholder="Nombre">
                  </div>
      
                  <div class="from-group mt-4">
                      <label for="">Primer apellido</label>
                      <input class="form-control" type="text" name="" id="" placeholder="Primer Apellido">
                  </div>
      
                  <div class="from-group mt-4">
                      <label for="">Segundo apellido</label>
                      <input class="form-control" type="text" name="" id="" placeholder="Segundo Apellido">
                  </div>
      
                  <div class="from-group mt-4">
                      <label for="">Tipo de indentificacion</label>
                      <select class="form-control" name="" id="">
                          <option value="">Seleccione un tipo de idecntificacion</option>
                          <option value="">C.Ciudadania</option>
                          <option value="">C.Extranjeria</option>
                          <option value="">Pasaporte</option>
                      </select>
                  </div>
      
                  <div class="from-group mt-4">
                      <label for="">Correo electronico</label>
                      <input class="form-control" type="text" name="" id="" placeholder="Email">
                  </div>
                  
                  <div class="from-group mt-4">
                      <label for="">Telefono</label>
                      <input class="form-control" type="text" name="" id="" placeholder="Telefono">
                  </div>
      
                  <div class="from-group mt-4" id="hab" class="hab">

                  </div>
      
                  <div class="mt-4">
                      <button class="btn btn-primary" type="submit">
                          Realizar reserva
                      </button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  document.querySelector('#seleccionar').addEventListener('click',function(){
      obtener();
  });
  function obtener(ids,valor,valor2,valor3){
    let nombre = valor;
    let precio = valor2;
    let tipo = valor3;

    let val = `
          <input name="tipo_hab" class="text-center form-control" type="text" value="${tipo}">
          <p> ${nombre} </p>
          <p> ${precio} </p>
    `;
    document.getElementById('hab').innerHTML=val;
  };

</script>
