<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json([
            'departamentos' => $departamentos
        ]);
    }

    public function store(StoreDepartamentoRequest $request)
    {
        $request->validated();
        $departamento = Departamento::create($request);
        return response()->json([
            'departamento' => $departamento
        ]);
    }

    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        $request->validated();
        $departamento->descripcion = $request['descripcion'];
        $departamento->save();
        return response()->json([
            'departamento' => $departamento
        ]);
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->eliminado = 1;
        $departamento->save();
        return response()->json([
            'departamento' => $departamento
        ]);
    }
}
