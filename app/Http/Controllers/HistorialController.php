<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth; 


class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $historiales = Historial::with('paciente','doctor')->get();
        return view('admin.historial.index',compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pacientes = Paciente::orderBy('nombres','asc')->get();
        return view('admin.historial.create',compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $historial = new Historial();

        $historial->detalle = $request->detalle;
        $historial->fechaVisita = $request->fechaVisita;
        $historial->doctor_id = Auth::user()->id;
        $historial->paciente_id = $request->paciente_id;
        $historial->save();

        return redirect()->route('admin.historials.index')
        ->with('mensaje','Se registró el historial correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $historial = Historial::find($id);
        return view('admin.historial.show',compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBy('nombres','asc')->get();
        return view('admin.historial.edit',compact('historial','pacientes'));
    }

    public function pdf($id){
        $historial = Historial::find($id);

        $pdf = \PDF::loadview('admin.historial.pdf',compact('historial'));
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Elaborado por: ". Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));
        
        return $pdf->stream();
    }

    public function update(Request $request, $id)
    {
        //
        $historial = Historial::find($id);

        $historial->detalle = $request->detalle;
        $historial->fechaVisita = $request->fechaVisita;
        $historial->paciente_id = $request->paciente_id;
        $historial->save();

        return redirect()->route('admin.historials.index')
        ->with('mensaje','Se actualiazó el historial correctamente')
        ->with('icono','success')
        ->with('titulo','Edición Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        Historial::destroy($id);
        return redirect()->route('admin.historials.index')
        ->with('mensaje','Se eliminó al historial correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
