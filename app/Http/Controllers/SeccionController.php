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
        $seccion = Seccion::where('eliminado', 0)->get();
        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function store(StoreSeccionRequest $request)
    {
        $request->validated();
        $seccion = Seccion::create([
            "descripcion" => $request["descripcion"]
        ]);

        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function edit(Seccion $seccion){
        return response()->json([
            'seccion' => $seccion
        ]);
    }

    public function update(UpdateSeccionRequest $request, Seccion $seccion)
    {
        $request->validated();
        $seccion->descripcion = $request['descripcion'];
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
