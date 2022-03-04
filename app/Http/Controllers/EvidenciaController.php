<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Http\Requests\StoreEvidenciaRequest;
use App\Http\Requests\UpdateEvidenciaRequest;

class EvidenciaController extends Controller
{

    public function index()
    {
    }

    public function store(StoreEvidenciaRequest $request)
    {

    }


    public function update(UpdateEvidenciaRequest $request, Evidencia $evidencia)
    {
        //
    }

    public function destroy(Evidencia $evidencia)
    {
        //
    }
}
