<?php

use App\Http\Controllers\RutasController;
use Illuminate\Support\Facades\Route;
use App\Exports\FacturasExport;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas generales
Route::get('/',[RutasController::class,'index'] )->name('inicio');
Route::get('/reservas',[RutasController::class,'indexReservas'] )->name('reservas');
Route::get('/habitaciones',[RutasController::class,'indexHabitaciones'] )->name('habitaciones');
Route::get('/crearHabitacion',[RutasController::class,'indexCrearHabitacion'] )->name('crearHabitacion');
Route::get('/Habitaciones',[RutasController::class,'verHabitaciones'] )->name('verHabitaciones');
Route::get('/formulario',[RutasController::class,'formulariodatos'] )->name('formulario');
Route::post('/reserva', [RutasController::class,'agregarReservas'])->name('addReserva'); 
Route::post('/habitacionCreada', [RutasController::class,'agregarHabitacion'])->name('addHabitacion'); 
Route::get('/reservaCreada',[RutasController::class,'confirmacionReserva'])->name('reservaCreada');
Route::get('crearUsuario',[RutasController::class,'crearUsuario'])->name('crearCuenta');
Route::post('/agregarUser', [RutasController::class,'agregarUsuarios'])->name('addUsuario'); 
Route::get('/agregarUsers', [RutasController::class,'usercreate'])->name('creado'); 
Route::post('/salir',[RutasController::class,'salir'])->name('salir');
Route::get('/login',[RutasController::class,'indexLogin'])->name('login');
Route::post('/login',[RutasController::class,'sesion'])->name('iniciarSesion');
Route::get('/resetYourPassword',[RutasController::class,'rePassword'])->name('resetPassword');
Route::get('/listReservas',[RutasController::class,'reservas'] )->name('verReservas');
Route::get('/cancelar/{id}',[RutasController::class,'cancelarReservas'])->name('cancelarReserva');
Route::get('/finalizarReserva/{id}',[RutasController::class,'finalizarReserva'])->name('finalizarReserva');

Route::get('/excel', function () {
    return Excel::download(new FacturasExport, 'reservas.xlsx');
})->name('excel');

Route::get('resetPassword',[RutasController::class,'sendEmailChangePassword'])->name('emailChangePassword');
Route::get('changePassword',[RutasController::class,'changePasswordForEmail'])->name('changePassword');
Route::post('newPasswordIntheDB',[RutasController::class,'newPass'])->name('newPassword');
Route::get('perfil',[RutasController::class,'verPerfilUser'])->name('verPerfil');
Route::get('ReservasUser',[RutasController::class,'reservasForuser'])->name('misReservas');
Route::get('reservasAdmin',[RutasController::class,'verReservasAdmin'])->name('userReservasAdmin');
Route::post('reserva-id-re',[RutasController::class,'idReserva'])->name('consultaID');
Route::post('reserva-identificacioncliente',[RutasController::class,'identificacionReserva'])->name('consultaIdentificacion');
