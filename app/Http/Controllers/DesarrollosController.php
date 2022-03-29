<?php

namespace App\Http\Controllers;

use App\Models\Desarrollo;
use App\Http\Requests\StoreDesarrollosRequest;
use App\Http\Requests\UpdateDesarrollosRequest;
use App\Models\Etapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DesarrollosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desarrollo = Desarrollo::with('etapas')->get();

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

        $arrEtapa = $request['etapas'];

        foreach ($arrEtapa as $etapa) {
            Etapa::create([
                'descripcion' => $etapa,
                'desarrollo_id' => $desarrollo->id
            ]);
        }   

        return response()->json([
            'desarrollo' => $desarrollo
        ], 200);
    }

    public function desarrolloPortada(Desarrollo $desarrollo, Request $request){

        if($request->hasFile('foto')){
            $url = $request->file('foto')->store('desarrollo', 'public');
                //  Resize a la imagen
            $imagen = Image::make(public_path("storage/{$url}"));
            // $imagen = Image::make(public_path("storage/{$url}"));
            $imagen->save();
            $desarrollo->url = $url;
            $desarrollo->save();
        }

        return response()->json([
            'desarrollo' => $desarrollo
        ], 200);
    }

    public function edit(Desarrollo $desarrollo)
    {

        $desarrollo = Desarrollo::where('id', $desarrollo->id)->with('etapas')->first();
        return response()->json([
            'desarrollo' => $desarrollo
        ]);
    }

    public function update(UpdateDesarrollosRequest $request, Desarrollo $desarrollo)
    {
        $request->validated();

        $desarrollo->descripcion = $request['descripcion'];

        $desarrollo->save();

        $etapaEliminada = $request['etapaEliminada'];

        foreach ($etapaEliminada as $etapa) {
            Etapa::where('id', $etapa)->delete();
        }

        $arrEtapa = $request['nuevaEtapa'];

        foreach ($arrEtapa as $etapa) {
            Etapa::create([
                'descripcion' => $etapa,
                'desarrollo_id' => $desarrollo->id
            ]);
        }   

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

    public function verDesarrollo(Desarrollo $desarrollo){

        $file = $desarrollo->url;
        if( $file !== null) {
            if(File::exists('storage/'.$file)){
                return response()->file(public_path()."/storage/".$file);
            }
        }

        
        return response()->file(public_path()."/img/imageNotFound.png");
    }

}
