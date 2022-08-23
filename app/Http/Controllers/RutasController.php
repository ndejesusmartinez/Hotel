<?php

namespace App\Http\Controllers;

use App\Models\reservas;
use App\Models\habitaciones;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\mail\resetPassword;
use App\mail\datosReserva;
use Illuminate\Support\Facades\Mail;

class RutasController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function indexCrearHabitacion(){
        return view('agregarHabitaciones');
    }

    public function indexReservas()
    {
        return view('reservas');
    }

    public function indexHabitaciones(){
        return view('habitaciones');
    }

    public function formulariodatos(){
        return view('datos');
    }
    public function agregarReservas(Request $request)
    {
        $this->validate($request,[
            'nombres' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'tipo_id' => 'required',
            'identificacion' => 'required',
            'entrada'=>'required',
            'salida'=>'required',
            'email'=> 'required',
            'tel'=> 'required',
            'tipo_hab'=> 'required'
        ]);
        reservas::create([
            'nombres'=>$request->nombres,
            'apellido1'=>$request->apellido1,
            'apellido2'=>$request->apellido2,
            'tipo_id'=>$request->tipo_id,
            'identificacion'=>$request->identificacion,
            'entrada'=>$request->entrada,
            'salida'=>$request->salida,
            'email'=>$request->email,
            'tel'=>$request->tel,
            'tipo_hab'=>$request->tipo_hab
        ]);
        
        return redirect()->route('reservaCreada',['email'=>$request->email,'nombres'=>$request->nombres,'apellido1'=>$request->apellido1,'apellido2'=>$request->apellido2,'tipo_id'=>$request->tipo_id,'tel'=>$request->tel,'tipo_hab'=>$request->tipo_hab,'identificacion'=>$request->identificacion,'entrada'=>$request->entrada,'salida'=>$request->salida]);
    }

    public function confirmacionReserva(Request $request)
    {
        $id=$request->id;
        $email = $request->email;
        $nombres = $request->nombres;
        $apellido1= $request->apellido1;
        $apellido2= $request->apellido2;
        $tipo_id=$request->tipo_id;
        $tel=$request->tel;
        $tipo_hab=$request->tipo_hab;

        $datosReserva = `
        <h1 class="text-center">
            Datos de la reserva
        </h1>
        <div class="container text-center">
            <div class="mb-3 mt-3">
                <label for="">Id:</label>
                <label for="">
                    $id
                </label>
            </div>
        </div>
        `;
        $correo2 = new datosReserva;
        Mail::to("$email")->send($correo2);
        return view ('confirmacionReserva',['nombres'=>$nombres,'email'=>$email,'apellido1'=>$apellido1,'apellido2'=>$apellido2,'tipo_id'=>$tipo_id,'tel'=>$tel,'tipo_hab'=>$tipo_hab,'id'=>$id]);
        
    }

    public function agregarHabitacion(Request $request)
    {
        $this->validate($request,[
            'hab_nombre' => 'required',
            'hab_tipo' => 'required',
            'hab_precio' => 'required'
        ]);
        habitaciones::create([
            'HAB_NOMBRE'=>$request->hab_nombre,
            'HAB_TIPO'=>$request->hab_tipo,
            'HAB_PRECIO'=>$request->hab_precio
        ]);
        return back()->with('mensaje',"Habitacion $request->hab_nombre agregada a la base de datos");
    }

    public function agregarUsuarios(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ]);
        user::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        auth()->attempt($request->only('username','password'));
        return redirect()->route('creado');
    }

    public function verHabitaciones()
    {
        return view('listadoHabitaciones');
        //$datos = DB::table('habitaciones')->get();

        /*$datos = DB::select('select * from habitaciones');
        
        return $datos;

        echo $datos;*/
    }

    public function crearUsuario()
    {
        return view('crearUsuario');
    }

    public function usercreate()
    {
        return view('userC');
    }
    public function salir()
    {
        auth()->logout();
        return redirect()->route('inicio');
    }

    public function indexLogin()
    {
        return view('login');
    }

    public function sesion(Request $request)
    {
        if(!auth()->attempt($request->only('username','password'))){
            return back()->withErrors('mensaje','Credenciales invalidas');
        }
        return redirect()->route('inicio');
    }

    public function rePassword()
    {
        return view('resetPassword');
    }

    public function reservas()
    {
        return view('listadoReservas');
    }

    public function cancelarReservas($id)
    {
        $data = DB::select("SELECT  * FROM reservas WHERE id = '$id' ");
        foreach ($data as $key) {
            $estado = $key->estado;
        }
        
        if($estado == 'Finalizado'){
            return back()->with('mensaje',"No se puede cancelar la reserva con id $id, se encuentra en estado finalizado");
        }else{
            $datos = DB::update("UPDATE reservas SET estado = 'Cancelado' WHERE id ='$id' ");
            return back()->with('mensaje2',"Reserva con id: $id cancelada con exito");
        }
    }

    public function finalizarReserva($id)
    {
        $datos = DB::update("UPDATE reservas SET estado = 'Finalizado' WHERE id ='$id' ");
        return back()->with('mensaje2',"Reserva con id: $id finalizada con exito");
    }

    public function sendEmailChangePassword(Request $request){
        $emailDestinatario = $request->emailD;
        $correo = new resetPassword;
        Mail::to("$emailDestinatario")->send($correo);
        return back()->with('mensaje',"Correo enviado a: $emailDestinatario");
    }

    public function changePasswordForEmail(Request $request){
        $email = $request->email;
        return view('resetPassword',[
            'email'=>$email
        ]);
    }

    public function newPass(Request $request){
        $email = $request->email;
        $newPP = $request->newP;
        $datos = DB::update("update users set password = $newPP where id = ?", [$email]);
        
        return $datos;
    }

    public function verPerfilUser(){
        return view('perfilDeUsuario');
    }

    public function reservasForuser(){
        return view('Reservas-user');
    }

    public function verReservasAdmin(){
        return view('reservas-admin');
    }

    public function idReserva(Request $request){
        $id = $request->idReserva;
        return back()
        ->with('mensaje',"$id");
    }
    public function identificacionReserva(Request $request){
        $identificacionCliente = $request->identificacion;
        return back()
        ->with('datos',"$identificacionCliente");
    }
}
