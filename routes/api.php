<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\UserController;
use App\Models\Departamento;
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
    return $request->user();
});

Route::resource('listado', ListadoController::class)->only([
    'index', 'store', 'update', 'destroy', 'edit'
]);
Route::resource('seccion', SeccionController::class)->only([
    'index', 'store', 'update', 'destroy', 'edit'
]);

Route::resource('usuarios', UserController::class)->only([
    'index', 'store', 'update', 'destroy', 'edit'
]);

Route::resource('departamento', DepartamentoController::class)->only([
    'index', 'update', 'destroy', 'edit'
]);

Route::resource('agenda', AgendaController::class)->only([
    'index', 'store', 'update', 'destroy', 'edit'
]);

Route::get('/departamento-seccion/{id}', [DepartamentoController::class, 'obtenerSecciones']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);




Route::middleware(['auth:sanctum', 'cors'])->group(function () {


});
