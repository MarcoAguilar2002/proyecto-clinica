<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class ReporteController extends Controller
{
    public function index(){
        return view('admin.reportes');
    }
}
