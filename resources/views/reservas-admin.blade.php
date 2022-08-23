@extends('layout.app')

@section('Titutlo')
    <h1 class="text-center">Reservas por usuario</h1>
@endsection

@section('contenido')
        @csrf
        @if(session('mensaje2'))
        <h3 class="text-center">{{session('mensaje2')}}</h3>
        @endif
    <div class="container">
    @csrf
        @if(session('mensaje'))
        <?php
            $id = session('mensaje');
            $ii = DB::select("select * from reservas WHERE id = '$id' ");  
        ?>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap">
                        <h1 class="text-center">Datos del usuario</h1>
                        <thead class="thead">
                            <tr>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Apellidos </th>
                                <th class="text-center align-middle">Identificacion</th>
                                <th class="text-center align-middle">entrada</th>
                                <th class="text-center align-middle">salida</th>
                                <th class="text-center align-middle">Correo</th>
                                <th class="text-center align-middle">Telefono</th>
                                <th class="text-center align-middle">Tipo de habitacion</th>
                                <th class="text-center align-middle">estado</th>
                                <th class="text-center align-middle">N° de reserva</th>
                                <th class="text-center align-middle">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ii as $d)
                            <tr>
                                <td class="text-center align-middle"> {{ $d->nombres }} </td>
                                <td class="text-center align-middle"> {{ $d->apellido1 }} {{ $d->apellido2 }}</td>
                                <td class="text-center align-middle"> {{ $d->tipo_id }} {{ $d->identificacion }}</td>
                                <td class="text-center align-middle"> {{ $d->entrada }} </td>
                                <td class="text-center align-middle"> {{ $d->salida }} </td>
                                <td class="text-center align-middle"> {{ $d->email }} </td>
                                <td class="text-center align-middle"> {{ $d->tel }} </td>
                                <td class="text-center align-middle"> {{ $d->tipo_hab }} </td>
                                <td class="text-center align-middle" >
                                    <?php
                                        $estado = $d->estado; 
                                        if($estado == 'N'){
                                            echo('Inactivo');
                                        }elseif ($estado == 'S') {
                                            echo('Activo');
                                        }else{
                                            echo($estado);
                                        }
                                    ?>
                                </td>
                                <td class="text-center align-middle"> {{ $d->id }} </td>
                                <td class="text-center align-middle"> 
                                    <form action=" {{ route('cancelarReserva',$d->id) }}" method="get">
                                    <button class="btn btn-danger" value='{{ $d->id }}'   type="submit"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                        </svg>
                                        Cancelar
                                    </button> 
                                    </form>
                                    <form action=" {{ route('finalizarReserva',$d->id) }} " method="get">
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
        @endif
    </div>

    <div class="container">
        @csrf
            @if(session('datos'))
            <?php
                $iden = session('datos');
                $ii = DB::select("select * from reservas WHERE identificacion = '$iden' ");  
            ?>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <h1 class="text-center">Datos del usuario</h1>
                            <thead class="thead">
                                <tr>
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Apellidos </th>
                                    <th class="text-center align-middle">Identificacion</th>
                                    <th class="text-center align-middle">entrada</th>
                                    <th class="text-center align-middle">salida</th>
                                    <th class="text-center align-middle">Correo</th>
                                    <th class="text-center align-middle">Telefono</th>
                                    <th class="text-center align-middle">Tipo de habitacion</th>
                                    <th class="text-center align-middle">estado</th>
                                    <th class="text-center align-middle">N° de reserva</th>
                                    <th class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ii as $d)
                                <tr>
                                    <td class="text-center align-middle"> {{ $d->nombres }} </td>
                                    <td class="text-center align-middle"> {{ $d->apellido1 }} {{ $d->apellido2 }}</td>
                                    <td class="text-center align-middle"> {{ $d->tipo_id }} {{ $d->identificacion }}</td>
                                    <td class="text-center align-middle"> {{ $d->entrada }} </td>
                                    <td class="text-center align-middle"> {{ $d->salida }} </td>
                                    <td class="text-center align-middle"> {{ $d->email }} </td>
                                    <td class="text-center align-middle"> {{ $d->tel }} </td>
                                    <td class="text-center align-middle"> {{ $d->tipo_hab }} </td>
                                    <td class="text-center align-middle" >
                                        <?php
                                            $estado = $d->estado; 
                                            if($estado == 'N'){
                                                echo('Inactivo');
                                            }elseif ($estado == 'S') {
                                                echo('Activo');
                                            }else{
                                                echo($estado);
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center align-middle"> {{ $d->id }} </td>
                                    <td class="text-center align-middle"> 
                                        <form action=" {{ route('cancelarReserva',$d->id) }}" method="get">
                                        <button class="btn btn-danger" value='{{ $d->id }}'   type="submit"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                            </svg>
                                            Cancelar
                                        </button> 
                                        </form>
                                        <form action=" {{ route('finalizarReserva',$d->id) }} " method="get">
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
            @endif
    </div>
    
    <div class="container text-center">
        <button onclick="reservaid();" class="btn btn-primary">
            Consultar reservas por ID
        </button>

        <button onclick="reservaIdentificacion();" class="btn btn-primary">
            Consultar reservas por N° de identificacion
        </button>

        {{-- <button onclick="reservaEmail();" class="btn btn-primary">
            Consultar reservas por correo electronico
        </button> --}}
    </div>


    


    <div class="m-0 row justify-content-center pt-4 mb-4" id="data">
       
    </div>
@endsection



<script>
    function reservaid(){
        let datos = `
        <div class="col-auto w-50 text-center ">    
            <form action="{{ route('consultaID') }}" method="post">  
                @csrf
                @if(session('mensaje'))
                    <p>{{session('mensaje')}}</p>
                @endif
                <div class="from-group mt-4">
                    <label for="">ID de reserva</label>
                    <input type="text" class="form-control text-center" name="idReserva" placeholder="Ingresa el id de la reserva">
                </div>
                <div class="from-group mt-4">
                    <button type="submit" class="btn btn-success" >
                        Consultar
                    </button>
                </div>
            </form>
        </div>
        `;
        document.getElementById('data').innerHTML=datos;
    }

    function reservaIdentificacion(){
        let datos = `
        <div class="col-auto w-50 text-center ">    
            <form action="{{ route('consultaIdentificacion') }}" method="post">  
                @csrf
                @if(session('mensaje'))
                    <p>{{session('mensaje')}}</p>
                @endif
                <div class="from-group mt-4">
                    <label for="">N° de identificacion</label>
                    <input type="text" class="form-control text-center" name="identificacion" placeholder="Ingresa el numero de identificacion">
                </div>
                <div class="from-group mt-4">
                    <button type="submit" class="btn btn-success">
                        Consultar
                    </button>
                </div>
            </form>
        </div>
        `;
        document.getElementById('data').innerHTML=datos;
    }

    function reservaEmail(){
        let datos = `
        <div class="col-auto w-50 text-center ">    
                <div class="from-group mt-4">
                    <label for="">Correo electronico</label>
                    <input type="text" class="form-control text-center" name="idReserva" placeholder="Ingresa el correo electronico">
                </div>
                <div class="from-group mt-4">
                    <button type="submit" class="btn btn-success">
                        Consultar
                    </button>
                </div>
        </div>
        `;
        document.getElementById('data').innerHTML=datos;
    }

    function obtener(valor,valor1){
        let d = valor1;
        alert(`el valor es ${d}`);
    }
</script>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Datos de la reserva</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>