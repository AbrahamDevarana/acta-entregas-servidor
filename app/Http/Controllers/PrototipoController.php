<?php

namespace App\Http\Controllers;

use App\Models\Prototipo;
use App\Http\Requests\StorePrototipoRequest;
use App\Http\Requests\UpdatePrototipoRequest;

class PrototipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prototipo = Prototipo::all();

        return response()->json([
            'prototipo' => $prototipo
        ]);
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
     * @param  \App\Http\Requests\StorePrototipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrototipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prototipo  $prototipo
     * @return \Illuminate\Http\Response
     */
    public function show(Prototipo $prototipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prototipo  $prototipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prototipo $prototipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrototipoRequest  $request
     * @param  \App\Models\Prototipo  $prototipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrototipoRequest $request, Prototipo $prototipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prototipo  $prototipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prototipo $prototipo)
    {
        //
    }
}
