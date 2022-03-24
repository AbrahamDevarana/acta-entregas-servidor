<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::where('status', 1)->where('eliminado', 0)->get();
        return response()->json([
            'usuario' => $usuarios
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();
        $usuario = User::create([
            "name" => $request["name"],
            "last_name" => $request["last_name"],
            "password" => Hash::make($request["password"]),
            "email" => $request["email"],
            "email_verified_at" => Carbon::now(),
        ]);

        return response()->json([
            'usuario' => $usuario
        ]);
    }

    public function edit(User $usuario)
    {
        return response()->json([
            'usuario' => $usuario
        ]);
    }

    public function update(UpdateUserRequest $request, User $usuario)
    {
        $request->validated();
        $usuario->name = $request["name"];
        $usuario->status = $request["status"];

        if($request["password"]){
            $usuario->password = Hash::make($request["password"]);
        }
        $usuario->email = $request["email"];
        $usuario->save();

        return response()->json([
            'usuario' => $usuario
        ]);
    }

    public function destroy(User $usuario)
    {

        $imagen = $usuario->foto;
        

        if(File::exists('storage/'. $imagen)){
            //Elimina imagen del SERVIDOR
            File::delete('storage/'. $imagen);
        }
        
        $usuario->delete();

        return response()->json([
            "msg" => "success"
        ]);
    }

    public function status(User $usuario){
        $usuario->status = !$usuario->status;
        $usuario->save();
        return response()->json([
            'usuario' => $usuario
        ]);
    }


    public function fotoPerfil(User $usuario, Request $request){
        if($request->hasFile('foto')){
            $url = $request->file('foto')->store('profile', 'public');
                //  Resize a la imagen
            $imagen = Image::make(public_path("storage/{$url}"))->fit(300, 300);
            $imagen->save();
            $usuario->foto = $url;
            $usuario->save();
        }

        return response()->json([
            'usuario' => $usuario
        ]);
    }
}
