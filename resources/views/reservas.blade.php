@extends('layout.app')

@section('Titutlo')
<div class="container">
    <h1 class="text-center mt-1">
        RESERVAS
    </h1>
</div>
@endsection

@section('contenido')
<div class="m-0 row justify-content-center pt-4 mb-4">
    <div class="col-auto w-50 text-center ">
        <h1>Datos de tu reserva</h1>
        <form action="{{route('addReserva')}}" method="post">
            @csrf
            <div class="from-group mt-4">
                <label class="text-center" for="">Nombre</label>
                <input class="form-control" type="text" name="nombres" id="" placeholder="Nombres">
            </div>

            <div class="from-group mt-4">
                <label for="">Primer apellido</label>
                <input class="form-control" type="text" name="apellido1" id="" placeholder="Primer Apellido">
            </div>

            <div class="from-group mt-4">
                <label for="">Segundo apellido</label>
                <input class="form-control" type="text" name="apellido2" id="" placeholder="Segundo Apellido">
            </div>

            <div class="from-group mt-4">
                <label for="">Tipo de indentificacion</label>
                <select class="form-control" name="tipo_id" id="">
                    <option  value="">Seleccione un tipo de idecntificacion</option>
                    <option  value="CC">C.Ciudadania</option>
                    <option  value="CE">C.Extranjeria</option>
                    <option  value="PP">Pasaporte</option>
                </select>
            </div>

            <div class="from-group mt-4">
                <label for="">Identificacion</label>
                <input class="form-control" type="text" name="identificacion" id="" placeholder="# Identificacion">
            </div>

            <div class="from-group mt-4">
                <label for="">Fecha de entrada</label>
                <input class="form-control" type="date" name="entrada" id="" placeholder="">
            </div>
            
            <div class="from-group mt-4">
                <label for="">Fecha de salida</label>
                <input class="form-control" type="date" name="salida" id="" placeholder="">
            </div>

            <div class="from-group mt-4">
                <label for="">Correo electronico</label>
                <input class="form-control" type="text" name="email" id="" placeholder="Email">
            </div>
            
            <div class="from-group mt-4">
                <label for="">Telefono</label>
                <input class="form-control" type="text" name="tel" id="" placeholder="Telefono">
            </div>

            <div class=" from-group mt-4">
                <button type="button" class="btn btn-success form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Selecciona una habitacion</button>
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
@endsection

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center" id="hab3">
        </div>
        <div class="from-group mt-4 modal-body" id="hab2">
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-dismiss="modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
              </svg>
              Regresar al menú anterior
            </button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Elige la habitacion de tu gusto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <?php
                $i = 0;
                $datos = DB::select('select * from habitaciones')
            ?>
            <table class="table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead">
                    <tr>
                        <th class="text-center align-middle">No</th>
                        <th class="text-center align-middle">Nombre</th>
                        <th class="text-center align-middle">Tipo de habitacion</th>
                        <th class="text-center align-middle">Precio</th>
                        <th class="text-center align-middle">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $nom)
                        <tr>
                            <td class="text-center align-middle">{{ $nom->id }}</td>
                            <td class="text-center align-middle"> {{ $nom->HAB_NOMBRE }} </td>
                            <td class="text-center align-middle"> {{ $nom->HAB_TIPO }} </td>
                            <td class="text-center align-middle"> {{ $nom->HAB_PRECIO }} </td>
                            <td class="text-center align-middle">
                                <button class="btn btn-success" data-bs-dismiss="modal" onclick="obtener1('ids','{{$nom->id}}','{{$nom->HAB_NOMBRE}}','{{$nom->HAB_TIPO}}','{{$nom->HAB_PRECIO}}');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                    </svg>
                                    Seleccionar
                                </button> 
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="verFotosHabitacion('ids','{{$nom->id}}','{{$nom->HAB_NOMBRE}}','{{$nom->HAB_PRECIO}}','{{$nom->ruta}}');">
                                    Ver fotos
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>


<script>
    document.querySelector('#seleccionar').addEventListener('click',function(){
        obtener1();
    });
    

    function obtener1(ids,valor,valor1,valor2,valor3){
        
        let id = valor;
        let nombre = valor1;
        let tipo = valor2;
        let precio = valor3;

        let datos = `
        <div class="col-sm text-center mb-4 p-4" style="background-color:rgb(224, 223, 223)">
            <h3 class="text-center"> ${nombre} </h3>
            <input name="tipo_hab" class="text-center form-control" type="text" value="${tipo}">
            <div class="">
                <label for="">Descripcion</label>
                <p>Cuatro cama doble, baño interno, climatizado</p>
                <p>valor $: ${precio} COP por noche</p>
            </div>
          </div>
        `;
         document.getElementById('hab').innerHTML=datos;

    }

    function verFotosHabitacion(ids,valor,valor2,valor3,valor4){
        let id = valor;
        let nombreHabitacion = valor2;
        let precio = valor3;
        let rutaImg = valor4;
        console.log(rutaImg);
        let data=`
            <div class="container mb-4 mt-4">
                <div class="row ">
                    <div class="col-sm text-center " style="background-color:rgb(224, 223, 223)">
                        <img class="" src="${rutaImg}" alt="">
                    </div>
                </div>
            </div>     
        `;
        let titlehabitation = `
            <h3>${nombreHabitacion}</h3>
        `;
        document.getElementById('hab2').innerHTML= data;
        document.getElementById('hab3').innerHTML = titlehabitation;
    }

</script>