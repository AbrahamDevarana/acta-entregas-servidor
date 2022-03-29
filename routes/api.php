<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViviendaController;
use App\Http\Controllers\DesarrollosController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\PrototipoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\UserController;
use App\Models\Desarrollo;
use App\Models\Etapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user();
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('verFoto/{usuario?}', [UserController::class, 'verFoto']);

Route::get('verDesarrollo/{desarrollo?}', [DesarrollosController::class, 'verDesarrollo']);


Route::get('picture/{file?}', [GaleriaController::class, 'getPicture']);
Route::resource('etapa', EtapaController::class)->only([
    'show'
]);


Route::middleware(['auth:sanctum'])->group(function () {
    // Custom Routes
    

    Route::resource('listado', ListadoController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);
    Route::resource('seccion', SeccionController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);
    Route::resource('usuarios', UserController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);
    Route::post('fotoPerfil/{usuario}', [UserController::class, 'fotoPerfil']);
    
    Route::resource('vivienda', ViviendaController::class)->only([
        'index', 'update', 'destroy', 'edit'
    ]);
    Route::resource('agenda', AgendaController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);
    Route::post('desarrolloPortada/{desarrollo?}', [DesarrollosController::class, 'desarrolloPortada']);
    Route::resource('desarrollo', DesarrollosController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);
  
    Route::resource('prototipo', PrototipoController::class)->only([
        'index', 'store', 'update', 'destroy', 'edit'
    ]);

  
    Route::get('/vivienda-seccion/{id}', [ViviendaController::class, 'obtenerSecciones']);

});
