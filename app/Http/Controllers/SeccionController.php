<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Http\Requests\StoreSeccionRequest;
use App\Http\Requests\UpdateSeccionRequest;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         $seccion = Seccion::with('listado')->where('eliminado', 0)->get();

        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function store(StoreSeccionRequest $request)
    {
        $request->validated();
        $seccion = new Seccion();
        $seccion->descripcion = $request["descripcion"];
        $seccion->save();
        $seccion->listado()->sync($request["lista"]);

        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function edit(Seccion $seccion){

        $seccion = Seccion::with("listado:id")->findOrFail($seccion->id);
        return response()->json([
            'seccion' => $seccion,
            // 'listado' => $listado
        ]);
    }

    public function update(UpdateSeccionRequest $request, Seccion $seccion)
    {
        $request->validated();
        $seccion->descripcion = $request['descripcion'];
        $seccion->listado()->sync($request["lista"]);
        $seccion->save();
        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function destroy(Seccion $seccion)
    {
        $seccion->eliminado = 1;
        $seccion->save();
        return response()->json([
            'seccion' => $seccion
        ]);
    }
}
