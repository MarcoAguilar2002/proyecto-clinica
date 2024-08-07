<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pacientes = Paciente::all();
        return view('admin.pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:pacientes',
            'celular' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:pacientes',
            'grupo_sanguineo' => 'required',
            'nro_seguro' => 'required|unique:pacientes',
            'observaciones' => 'required',
        ]);

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->celular = $request->celular;
        $paciente->genero = $request->genero;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->correo = $request->correo;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje','Se registro al paciente correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit',compact('paciente'));
    }

    public function update(Request $request, $id){
        //
        $paciente = Paciente::findOrFail($id);
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:pacientes,dni,'.$paciente->id,
            'celular' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:pacientes,correo,'.$paciente->id,
            'grupo_sanguineo' => 'required',
            'nro_seguro' => 'required|unique:pacientes,nro_seguro,'.$paciente->id,
            'observaciones' => 'required',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->celular = $request->celular;
        $paciente->genero = $request->genero;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->correo = $request->correo;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje','Se actualizó al paciente correctamente')
        ->with('icono','success')
        ->with('titulo','Edición Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje','Se eliminó al usuario correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
