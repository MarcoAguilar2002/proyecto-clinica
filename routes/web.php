<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PagoController;

Route::get('/', [WebController::class, 'index'])->name('index');
Auth::routes();

//ajax
Route::get('/admin/horarios/consultorios/{id}', [HorarioController::class, 'cargar_consultorio'])->name('admin.horarios.cargar')->middleware('auth','can:admin.horarios.cargar');
Route::get('/consultorios/{id}', [WebController::class, 'cargar_consultorio'])->name('cargarIndex');
Route::get('/horarios', [WebController::class, 'getHorarios']);
Route::get('/doctores', [WebController::class, 'getDoctoresPorEspecialidad']);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/reservas', [AdminController::class, 'ver_reservas'])->name('admin.reservas')->middleware('auth','can:admin.reservas');
Route::delete('/admin/reservas/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.reservas.destroy')->middleware('auth','can:admin.reservas.destroy');

Route::get('/admin/doctor/citas', [DoctorController::class, 'citas'])->name('admin.doctor.cita')->middleware('auth','can:admin.doctor.cita');
Route::put('/admin/doctor/citas/{id}', [DoctorController::class, 'editarCita'])->name('admin.doctor.editarCita')->middleware('auth','can:admin.doctor.editarCita');


//RUTAS ADMIN-USUARIOS
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth','can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth','can:admin.usuarios.create'); 
Route::POST('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth','can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth','can:admin.usuarios.show');    
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth','can:admin.usuarios.edit');    
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth','can:admin.usuarios.update');    
Route::delete('/admin/usuarios/{id}/delete', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth','can:admin.usuarios.destroy'); 
//RUTAS ADMIN-SECRETARIAS
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth','can:admin.secretarias.index');
Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth','can:admin.secretarias.create'); 
Route::post('/admin/secretarias/create', [SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth','can:admin.secretarias.store'); 
Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth','can:admin.secretarias.show');    
Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth','can:admin.secretarias.edit');    
Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth','can:admin.secretarias.update');    
Route::delete('/admin/secretarias/{id}/delete', [SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth','can:admin.secretarias.destroy'); 
//RUTAS ADMIN-PACIENTES
Route::get('/admin/pacientes', [PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth','can:admin.pacientes.index');
Route::get('/admin/pacientes/create', [PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth','can:admin.pacientes.create'); 
Route::POST('/admin/pacientes/create', [PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth','can:admin.pacientes.store');
Route::get('/admin/pacientes/{id}', [PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth','can:admin.pacientes.show');    
Route::get('/admin/pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth','can:admin.pacientes.edit');    
Route::put('/admin/pacientes/{id}', [PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth','can:admin.pacientes.update');    
Route::delete('/admin/pacientes/{id}/delete', [PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth','can:admin.pacientes.destroy'); 
//RUTAS ADMIN-CONSULTORIOS
Route::get('/admin/consultorios', [ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth','can:admin.consultorios.index');
Route::get('/admin/consultorios/create', [ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth','can:admin.consultorios.create'); 
Route::POST('/admin/consultorios/create', [ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth','can:admin.consultorios.store');
Route::get('/admin/consultorios/{id}', [ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth','can:admin.consultorios.show');    
Route::get('/admin/consultorios/{id}/edit', [ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth','can:admin.consultorios.edit');    
Route::put('/admin/consultorios/{id}', [ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth','can:admin.consultorios.update');    
Route::delete('/admin/consultorios/{id}/delete', [ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth','can:admin.consultorios.destroy'); 

//RUTAS ADMIN-DOCTORES
Route::get('/admin/doctores', [DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth','can:admin.doctores.index');
Route::get('/admin/doctores/create', [DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth','can:admin.doctores.create'); 
Route::POST('/admin/doctores/create', [DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth','can:admin.doctores.store');
Route::get('/admin/doctores/{id}', [DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth','can:admin.doctores.show');    
Route::get('/admin/doctores/{id}/edit', [DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth','can:admin.doctores.edit');    
Route::put('/admin/doctores/{id}', [DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth','can:admin.doctores.update');    
Route::delete('/admin/doctores/{id}/delete', [DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth','can:admin.doctores.destroy'); 

//RUTAS ADMIN-Horarios
Route::get('/admin/horarios', [HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create', [HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth','can:admin.horarios.create'); 
Route::POST('/admin/horarios/create', [HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth','can:admin.horarios.show');    
Route::get('/admin/horarios/{id}/edit', [HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth','can:admin.horarios.edit');    
Route::put('/admin/horarios/{id}', [HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth','can:admin.horarios.update');    
Route::delete('/admin/horarios/{id}/delete', [HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth','can:admin.horarios.destroy'); 


//Reportes
Route::get('/admin/reportes',[ReporteController::class, 'index'])->name('admin.reportes')->middleware('auth','can:admin.reportes'); 

//Historial Clinico
Route::get('/admin/historial', [HistorialController::class, 'index'])->name('admin.historials.index')->middleware('auth','can:admin.historials.index');
Route::get('/admin/historials/create', [HistorialController::class, 'create'])->name('admin.historials.create')->middleware('auth','can:admin.historials.create');
Route::POST('/admin/historials/create', [HistorialController::class, 'store'])->name('admin.historials.store')->middleware('auth','can:admin.historials.store');
Route::get('/admin/historials/pdf/{id}', [HistorialController::class, 'pdf'])->name('admin.historials.pdf')->middleware('auth','can:admin.historials.pdf');
Route::get('/admin/historials/{id}', [HistorialController::class, 'show'])->name('admin.historials.show')->middleware('auth','can:admin.historials.show');    
Route::get('/admin/historials/{id}/edit', [HistorialController::class, 'edit'])->name('admin.historials.edit')->middleware('auth','can:admin.historials.edit');
Route::put('/admin/historials/{id}', [HistorialController::class, 'update'])->name('admin.historials.update')->middleware('auth','can:admin.historials.update');
Route::delete('/admin/historials/{id}/delete', [HistorialController::class, 'destroy'])->name('admin.historials.destroy')->middleware('auth','can:admin.historials.destroy');


//Rutas Pagos
Route::get('/admin/pagos', [PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth','can:admin.pagos.index');
Route::get('/admin/pagos/create', [PagoController::class, 'create'])->name('admin.pagos.create')->middleware('auth','can:admin.pagos.create');
Route::POST('/admin/pagos/create', [PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth','can:admin.pagos.store');
Route::get('/admin/pagos/pdf/{id}', [PagoController::class, 'pdf'])->name('admin.pagos.pdf')->middleware('auth','can:admin.pagos.pdf');
Route::get('/admin/pagos/{id}', [PagoController::class, 'show'])->name('admin.pagos.show')->middleware('auth','can:admin.pagos.show');    
Route::get('/admin/pagos/{id}/edit', [PagoController::class, 'edit'])->name('admin.pagos.edit')->middleware('auth','can:admin.pagos.edit');
Route::put('/admin/pagos/{id}', [PagoController::class, 'update'])->name('admin.pagos.update')->middleware('auth','can:admin.pagos.update');
Route::delete('/admin/pagos/{id}/delete', [PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth','can:admin.pagos.destroy');


//Eventos
Route::post('/admin/eventos/create',[EventController::class, 'store'])->name('admin.eventos.store')->middleware('auth','can:admin.eventos.store'); 



