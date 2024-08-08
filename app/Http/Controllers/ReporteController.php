<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        // Obtener distribución de pacientes por grupo sanguíneo -DR
        $grupo_sanguineo_data = Paciente::select('grupo_sanguineo', DB::raw('count(*) as total'))
            ->groupBy('grupo_sanguineo')
            ->get();

        return view('admin.reportes', compact('grupo_sanguineo_data'));
    }
}
