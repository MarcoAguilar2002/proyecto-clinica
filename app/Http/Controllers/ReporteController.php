<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        $especialidades = DB::table('doctors')
            ->select('especialidad', DB::raw('count(id) as numero_doctores'))
            ->groupBy('especialidad')
            ->get();

        return view('admin.reportes', compact('especialidades'));
    }
}
