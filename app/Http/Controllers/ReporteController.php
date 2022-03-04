<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Http\Requests\StoreReporteRequest;
use App\Http\Requests\UpdateReporteRequest;

class ReporteController extends Controller
{

    public function index()
    {
        $reportes = Reporte::all();
        return response()->json([
            'reportes' => $reportes
        ]);
    }

    public function store(StoreReporteRequest $request)
    {
        $request->validated();

        $reporte = Reporte::create([
            'idUser' => $request['idUser'],
            'url' => $request['url'],
            'tipoEvidencia' => $request['tipoEvidencia'],

        ]);
        return response()->json([
            'reporte' => $reporte
        ]);
    }

    public function update(UpdateReporteRequest $request, Reporte $reporte)
    {
        //
    }

    public function destroy(Reporte $reporte)
    {
        //
    }
}
