<?php

namespace App\Http\Controllers;

use App\Models\TipoVivienda;
use App\Http\Requests\StoreTipoViviendaRequest;
use App\Http\Requests\UpdateTipoViviendaRequest;

class TipoViviendaController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoViviendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoViviendaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoVivienda  $tipoVivienda
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVivienda $tipoVivienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoVivienda  $tipoVivienda
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoVivienda $tipoVivienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoViviendaRequest  $request
     * @param  \App\Models\TipoVivienda  $tipoVivienda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoViviendaRequest $request, TipoVivienda $tipoVivienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoVivienda  $tipoVivienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoVivienda $tipoVivienda)
    {
        //
    }
}
