<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index',compact('usuarios'));
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request){
        //$datos = request()->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje','Se registro al usuario correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show',compact('usuario'));
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario'));
    }

    public function update(Request $request,$id){
        $usuario = User::find($id);
        $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$usuario->id,
            'password' => 'confirmed'
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        
        if($request->filled('password')){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje','Se actualizó al usuario correctamente')
        ->with('icono','success')
        ->with('titulo','Actualización Exitosa');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje','Se eliminó al usuario correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
