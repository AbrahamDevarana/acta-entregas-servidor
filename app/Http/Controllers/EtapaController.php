<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use App\Http\Requests\StoreEtapaRequest;
use App\Http\Requests\UpdateEtapaRequest;
use App\Models\Desarrollo;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function store(StoreEtapaRequest $request)
    {
        //
    }
    public function show(Etapa $etapa)
    {
        
        $etapa = Etapa::with('prototipos')->findOrFail($etapa->id);
        return response()->json([
            'etapa' => $etapa
        ]);
    }
    public function edit(Etapa $etapa)
    {
        //
    }
    public function update(UpdateEtapaRequest $request, Etapa $etapa)
    {
        //
    }

    public function destroy(Etapa $etapa)
    {
        //
    }

    public function upgrade(Etapa $etapa, Request $request)
    {
        $arrPrototipos = $request->all();
        $etapa->prototipos()->sync($arrPrototipos);
        $etapa = Etapa::with('prototipos')->findOrFail($etapa->id);

        return response()->json([
            'etapa' => $etapa
        ]);
    }
}
