<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Consultorio; 
use Illuminate\Support\Facades\Auth; 

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
        $request->validate([
            'consultorio_id' => 'required',
            'doctor_id' => 'required',
            'color' => 'required',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s|after:start'
        ]);

        $consultorio = Consultorio::where('especialidad', $request->consultorio_id)->first();

        $event = new Event;
        $event->title = $request->turno." ".$request->consultorio_id;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->color = $request->color;
        $event->user_id = Auth()->user()->id; 
        $event->doctor_id = $request->doctor_id;
        $event->consultorio_id =  $consultorio->id;
        $event->estado =  "En Curso";
        $event->save();

       
        return redirect()->route('admin.index')
        ->with('mensaje','Se registro la cita correctamente')
        ->with('icono','success')
        ->with('titulo','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        
    }
}
