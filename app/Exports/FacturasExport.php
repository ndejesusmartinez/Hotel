<?php

namespace App\Exports;

use App\Models\reservas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class FacturasExport implements WithHeadings,FromCollection
{
    public function collection()
    {
        $datos = reservas::select('select * from reservas');
        //$datos = DB::select('select * from habitaciones');
        $columnas=[
            DB::raw("id"),
            DB::raw("nombres"),
            DB::raw("apellido1"),
            DB::raw("apellido2"),
            DB::raw("tipo_id"),
            DB::raw("identificacion"),
            DB::raw("entrada"),
            DB::raw("salida"),
            DB::raw("email"),
            DB::raw("tel"),
            DB::raw("tipo_hab"),
            DB::raw("(CASE
                        WHEN estado = 'S' THEN 'Activo'
                        WHEN estado = 'Finalizado' THEN 'Finalizado'
                    END)")
        ];
        return $datos->select($columnas)
        //->where('HAB_TIPO','Multiple')
        ->get();
    }

    public function headings(): array
    {
        return[
            'ID RESERVA',
            'NOMBRE',
            'PRIMER APELLIDO',
            'SEGUNDO APELLIDO',
            'TIPO DE IDENTIFICACION',
            'IDENTIFICACION',
            'FECHA DE INGRESO',
            'FECHA DE SALIDA',
            'EMAIL',
            'TELEFOON',
            'HABITACION',
            'ESTADO'
        ];
    }
    
}
