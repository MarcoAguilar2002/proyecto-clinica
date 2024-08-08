<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Doctor;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = $this->reportes();

        return view('admin.reportes', $reportes);
    }

    public function reportes()
    {
        // Obtener todos los pagos
        $pagos = Pago::all();

        // Obtener todos los doctores
        $doctores = Doctor::all();

        // Obtener los pagos agrupados por doctor
        $pagos_doctores = [];
        foreach ($doctores as $doctor) {
            $pagos_doctores[$doctor->id] = $pagos->where('doctor_id', $doctor->id);
        }

        return ['pagos' => $pagos, 'doctores' => $doctores, 'pagos_doctores' => $pagos_doctores];
    }
}
