<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class datosReserva extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Datos de la reserva";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $id=$request->id;
        $email = $request->email;
        $nombres = $request->nombres;
        $apellido1= $request->apellido1;
        $apellido2= $request->apellido2;
        $tipo_id=$request->tipo_id;
        $tel=$request->tel;
        $tipo_hab=$request->tipo_hab;
        
        return $this->view ('confirmacionReservaEmail',['nombres'=>$nombres,'email'=>$email,'apellido1'=>$apellido1,'apellido2'=>$apellido2,'tipo_id'=>$tipo_id,'tel'=>$tel,'tipo_hab'=>$tipo_hab,'id'=>$id]);
    }
}
