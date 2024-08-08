<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Paciente;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $pagos = Pago::all();
        return view('admin.pagos.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pacientes = Paciente::orderBy('nombres','asc')->get();
        $doctors = Doctor::orderBy('nombres','asc')->get();
        return view('admin.pagos.create',compact('pacientes','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required'
        ]);

        $pago = new Pago();
        $pago -> monto = $request->monto;
        $pago -> fecha_pago = $request->fecha_pago;
        $pago -> descripcion = $request->descripcion;
        $pago -> paciente_id = $request->paciente_id;
        $pago -> doctor_id = $request->doctor_id;

        $pago->save();

        return redirect()->route('admin.pagos.index')
        ->with('mensaje','Se registró el pago correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pago = Pago::find($id);
        return view('admin.pagos.show',compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pago = Pago::find($id);
        $doctors = Doctor::orderBy('nombres','asc')->get();
        $pacientes = Paciente::orderBy('nombres','asc')->get();
        return view('admin.pagos.edit',compact('pago','doctors','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required'
        ]);
        $pago = Pago::find($id);
        $pago -> monto = $request->monto;
        $pago -> fecha_pago = $request->fecha_pago;
        $pago -> descripcion = $request->descripcion;
        $pago -> paciente_id = $request->paciente_id;
        $pago -> doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pagos.index')
        ->with('mensaje','Se actualizó el pago correctamente')
        ->with('icono','success')
        ->with('titulo','Actualización Exitosa');

    }

    /**
     * Remove the specified resource from storage.
     */

     public function pdf($id){
        $pago = Pago::find($id);

        $pdf = \PDF::loadview('admin.pago.pdf',compact('pago'));
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Elaborado por: ". Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));
        
        return $pdf->stream();
    }

    public function destroy($id)
    {
        //
        Pago::destroy($id);
        return redirect()->route('admin.pagos.index')
        ->with('mensaje','Se eliminó el pago correctamente')
        ->with('icono','error')
        ->with('titulo','Eliminación Exitosa');
    }
}
