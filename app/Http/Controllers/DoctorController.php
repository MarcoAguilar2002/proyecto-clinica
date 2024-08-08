<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function citas(){
        $eventos = Event::all();
        return view('admin.cancelarCita',compact("eventos"));
    }

    public function editarCita($id){
        $evento = Event::find($id);
        $evento->estado = "Finalizada";
        $evento->save();
        return redirect()->route('admin.reservas')
        ->with('mensaje','Se finalizó la cita correctamente')
        ->with('icono','success')
        ->with('titulo','Cita Finalizada');
    }

    public function store(Request $request)
    {
        //
        $request -> validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'codigo_colegiado' => 'required|unique:doctors',
            'celular' => 'required', 
            'especialidad' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->celular = $request->celular;
        $doctor->codigo_colegiado = $request->codigo_colegiado;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        $usuario->assignRole('doctor');

        return redirect()->route('admin.doctores.index')
        ->with('mensaje','Se registró al doctor correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $doctor = Doctor::find($id);

        $request -> validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'codigo_colegiado' => 'required|unique:doctors,codigo_colegiado,'.$doctor->id,
            'celular' => 'required', 
            'especialidad' => 'required',
            'email' => 'required|unique:users,email,'.$doctor->user->id,
            'password' => 'confirmed'
        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->celular = $request->celular;
        $doctor->codigo_colegiado = $request->codigo_colegiado;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if($request ->filled('password')){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje','Se acutalizó al doctor correctamente')
        ->with('icono','success')
        ->with('titulo','Edición Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $doctor = Doctor::find($id);
        $user = $doctor->user;
        $user->delete();
        $doctor->delete();
        return redirect()->route('admin.doctores.index')
        ->with('mensaje','Se eliminó al doctor correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
