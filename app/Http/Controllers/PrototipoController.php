<?php

namespace App\Http\Controllers;

use App\Models\Prototipo;
use App\Http\Requests\StorePrototipoRequest;
use App\Http\Requests\UpdatePrototipoRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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

    public function store(StorePrototipoRequest $request)
    {
        $request->validated();
        $prototipo = Prototipo::create([
            'nombre' => $request['nombre'],
            'descripcion' => 'Departamento',
            'tipo' => 1            
        ]);

        return response()->json([
            'prototipo' => $prototipo
        ], 200);
    }


    public function edit(Prototipo $prototipo)
    {
        return response()->json([
            'prototipo' => $prototipo
        ]);
    }

    public function update(UpdatePrototipoRequest $request, Prototipo $prototipo)
    {
        $request->validated();

        $prototipo->update([
            'nombre' => $request['nombre'],
        ]);

        return response()->json([
            'prototipo' => $prototipo
        ], 200);
    }

    public function destroy(Prototipo $prototipo)
    {
        //
    }

    public function subirPlano(Prototipo $prototipo, Request $request){
        if($request->hasFile('foto')){
            $url = $request->file('foto')->store('prototipo', 'public');
            $prototipo->planos = $url;
            $prototipo->save();
        }

        return response()->json([
            'prototipo' => $prototipo
        ], 200);
    }

    public function obtenerPlano(Prototipo $prototipo){
        $file = $prototipo->planos;
        if( $file !== null) {
            if(File::exists('storage/'.$file)){
                return response()->file(public_path()."/storage/".$file);
            }
        }

        
        return response()->file(public_path()."/img/imageNotFound.png");
    }
}
