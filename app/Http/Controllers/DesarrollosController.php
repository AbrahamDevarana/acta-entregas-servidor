<?php

namespace App\Http\Controllers;

use App\Models\Desarrollo;
use App\Http\Requests\StoreDesarrollosRequest;
use App\Http\Requests\UpdateDesarrollosRequest;

class DesarrollosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desarrollo = Desarrollo::with('prototipos')->get();

        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }

    public function store(StoreDesarrollosRequest $request)
    {

        $request->validated();
        $desarrollo = Desarrollo::create([  
            'descripcion' => $request['descripcion']
        ]);
        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }

    public function edit(Desarrollo $desarrollo)
    {

        $desarrollo = Desarrollo::where('id', $desarrollo->id)->with('prototipos')->first();
        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }

    public function update(UpdateDesarrollosRequest $request, Desarrollo $desarrollo)
    {
        $request->validated();

        $desarrollo->descripcion = $request['descripcion'];
        $desarrollo->save();
        
        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }

    public function destroy(Desarrollo $desarrollo)
    {
        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }
}
