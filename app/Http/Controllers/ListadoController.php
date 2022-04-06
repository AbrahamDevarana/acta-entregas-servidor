<?php

namespace App\Http\Controllers;

use App\Models\Listado;
use App\Http\Requests\StoreListadoRequest;
use App\Http\Requests\UpdateListadoRequest;

class ListadoController extends Controller
{

    public function index()
    {
        $listado = Listado::where('eliminado', 0)->with('desarrollo')->get();
        return response()->json([
            'listado' => $listado
        ]);
    }

    public function show($id){
        $listado = Listado::where('eliminado', 0)->with('desarrollo')->where('desarrollo_id', $id)->get();
        return response()->json([
            'listado' => $listado
        ]);
    }

    public function store(StoreListadoRequest $request)
    {
        $request->validated();
        $listado = Listado::create([
            "descripcion" => $request["descripcion"],
            "tipoListado" => $request["tipoListado"],
            "desarrollo_id" => $request["desarrollo_id"]
        ]);
        return response()->json([
            'listado' => $listado
        ]);
    }

    public function edit(Listado $listado){
        return response()->json([
            'listado' => $listado
        ]);
    }

    public function update(UpdateListadoRequest $request, Listado $listado)
    {
        $request->validated();
        $listado->descripcion = $request['descripcion'];
        $listado->tipoListado = $request['tipoListado'];
        $listado->desarrollo_id = $request['desarrollo_id'];
        $listado->save();
        return response()->json([
            'listado' => $listado
        ]);
    }

    public function destroy(Listado $listado)
    {
        $listado->eliminado = 1;
        $listado->save();
        return response()->json([
            'listado' => $listado
        ]);
    }
}
