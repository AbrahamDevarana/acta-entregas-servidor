<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::with('departamentos')->where('eliminado', 0)->get();

        return response()->json([
           'agenda' => $agenda
        ]);
    }

    public function store(StoreAgendaRequest $request)
    {
        $request->validated();

        $agenda = Agenda::create([
            'descripcion' => $request['descripcion'],
            'tipo_agenda' => $request['tipo_agenda'],
            'fecha' => $request['fecha'],
            'departamento_id' => $request['departamento_id'],
        ]);

        return response()->json([
            'agenda' => $agenda
        ]);
    }

    public function edit(Agenda $agenda)
    {
        return response()->json([
            'agenda' => $agenda
        ]);
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $request->validated();

        $agenda->descripcion = $request['descripcion'];
        $agenda->tipo_agenda = $request['tipo_agenda'];
        $agenda->fecha = $request['fecha'];
        $agenda->departamento_id = $request['departamento_id'];
        $agenda->save();

        return response()->json([
            'agenda' => $agenda
        ]);
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->eliminado = 1;
        $agenda->save();
        return response()->json([
            'agenda' => $agenda
        ]);
    }
}
