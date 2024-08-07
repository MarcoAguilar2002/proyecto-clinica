<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Event;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //
     public function index(){
        
        $consultorios = Consultorio::all();
        
        return view('index',compact('consultorios'));
     }

     public function getDoctoresPorEspecialidad(Request $request){
        $especialidad = $request->input('especialidad');
        $doctores = Doctor::where('especialidad', $especialidad)->get();

        return response()->json($doctores);
    }

    public function getHorarios(Request $request){
        $doctor_id = $request->query('doctor_id');
        $fecha = $request->query('fecha');
        $dias_espanol = [
            'Sunday' => 'Domingo',
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miercoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sabado'
        ];
        $dia_ingles = date('l', strtotime($fecha));
        $dia = $dias_espanol[$dia_ingles];

        // Asegúrate de que la consulta esté correcta según tu esquema de base de datos
        $horarios = Horario::where('doctor_id', $doctor_id)
                        ->where('dia', $dia)
                        ->get(['hora_inicio', 'hora_fin']);
                        
        return response()->json($horarios);
    }





     public function cargar_consultorio($id){
        $consultorio = Consultorio::find($id);
        try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            return view('admin.horarios.cargar_consultorio',compact('horarios','consultorio'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=>'Error']);
        }
     }
}
