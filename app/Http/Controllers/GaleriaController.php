<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GaleriaController extends Controller
{
    public function store (Request $request) {
        $request->validated();
            // leer la imagen
            $url = $request->file('foto')->store('galeria', 'public');
            //  Resize a la imagen
            $imagen = Image::make( public_path("storage/{$url}"))->fit(800, 450);
            $imagen->save();
            // Almacenar con modelo
            $imagenDB = new Foto;
            $imagenDB->url = $url;
            $imagenDB->save();


            // Restpuesta

            $response = [
                'foto' => $url
            ];

            return response()->json($response);
    }


    public function update(Request $request){

    }

    public function destroy(Request $request){

        $imagen = $request->get('imagen');
        if(File::exists('storage/'. $imagen)){
            //Elimina imagen del SERVIDOR
            File::delete('storage/'. $imagen);

            //Elimina Imagen de la BD
            Foto::where('ruta_imagen', $imagen)->delete();

            $response = [
                'mensaje' => 'Imagen Eliminada',
                'imagen' => $imagen,
            ];
        }
        return response()->json($response);
    }

    public function getPicture( $file = "" ){

        if(File::exists('storage/'.$file)){
            return response()->file(public_path()."/storage/".$file);
        }

        return response()->file(public_path()."/img/notFound.png");
    }
}
