<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {

        $rangoFechas = Pago::select(
            DB::raw('min(fecha_pago) as fecha_inicio'),
            DB::raw('max(fecha_pago) as fecha_fin')
        )->first();
        $pagosTotales = Pago::select('doctors.especialidad', DB::raw('sum(pagos.monto) as total'))
            ->join('pacientes', 'pagos.paciente_id', '=', 'pacientes.id')
            ->join('doctors', 'pagos.doctor_id', '=', 'doctors.id')
            ->whereBetween(
                'pagos.fecha_pago',
                [DB::raw('(SELECT min(p3.fecha_pago) FROM pagos p3)'), DB::raw('(SELECT max(p4.fecha_pago) FROM pagos p4)')]
            )->groupBy('doctors.especialidad')
            ->get();

        return view('admin.reportes', compact('pagosTotales', 'rangoFechas'));
    }
}
