<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Http\Requests\StoreZonaRequest;
use App\Http\Requests\UpdateZonaRequest;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $zona = Zona::with('listado')->with('desarrollo')->where('eliminado', 0)->get();
        return response()->json([
            'zona' => $zona
        ]);
    }

    public function show($id){
        $zona = Zona::with('listado')->with('desarrollo')->where('eliminado', 0)->where('desarrollo_id', $id)->get();
        return response()->json([
            'zona' => $zona
        ]);
    }

    public function store(StoreZonaRequest $request)
    {
        $request->validated();
        $zona = new Zona();
        $zona->descripcion = $request["descripcion"];
        $zona->desarrollo_id = $request["desarrollo_id"];
        $zona->save();
        $zona->listado()->sync($request["lista"]);

        return response()->json([
            'zona' => $zona
        ]);
    }

    public function edit(Zona $zona){

        $zona = Zona::with("listado:id")->findOrFail($zona->id);
        return response()->json([
            'zona' => $zona,
            // 'listado' => $listado
        ]);
    }

    public function update(UpdateZonaRequest $request, Zona $zona)
    {
        $request->validated();
        $zona->descripcion = $request['descripcion'];
        $zona->desarrollo_id = $request["desarrollo_id"];
        $zona->listado()->sync($request["lista"]);
        $zona->save();
        return response()->json([
            'zona' => $zona
        ]);
    }

    public function destroy(Zona $zona)
    {
        $zona->eliminado = 1;
        $zona->save();
        return response()->json([
            'zona' => $zona
        ]);
    }
}
