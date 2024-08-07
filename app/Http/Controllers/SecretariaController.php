<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretaria.index',compact('secretarias'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretaria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:secretarias',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        $usuario->assignRole('secretaria');
        return redirect()->route('admin.secretarias.index')
        ->with('mensaje','Se registro a la secretaria correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    public function show($id)
    {
        //
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretaria.show',compact('secretaria'));
    }

    public function edit($id)
    {
        //
        $secretaria = Secretaria::with('user')->findOrFail($id);
        
        return view('admin.secretaria.edit',compact('secretaria'));
    }


    public function update(Request $request, $id)
    {
        //
        $secretaria = Secretaria::find($id);

        $request -> validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:secretarias,dni,'.$secretaria->id,
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:users,email,'.$secretaria->user->id,
            'password' => 'confirmed'
        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if($request ->filled('password')){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje','Se acutalizó a la secretaria correctamente')
        ->with('icono','success')
        ->with('titulo','Edición Exitosa');
    }

    public function destroy($id)
    {
        //
        $secretaria = Secretaria::find($id);
        $user = $secretaria->user;
        $user->delete();
        $secretaria->delete();
        return redirect()->route('admin.secretarias.index')
        ->with('mensaje','Se eliminó a la secretaria correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
