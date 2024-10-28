<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\VehiculoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

//concuerda con el controlador el auth.register y el nombre de la vista sirve para mostrar form
Route::get('/register',[RegisterController::class,'show']);
//para registrar en el form
Route::post('/register',[RegisterController::class,'register']);

Route::get('/login',[LoginController::class,'show']);

Route::post('/login',[LoginController::class,'login']);

Route::get('/home',[HomeController::class,'index']);

Route::get('/logout',[LogoutController::class,'logout']);

Route::get('/perfil', [ClienteController::class, 'perfil'])->name('perfil');

Route::post('/perfil', [ClienteController::class, 'guardarPerfil'])->name('perfil.guardar');

Route::resource('vehiculos', VehiculoController::class)->middleware('auth');

Route::get('/vehiculos/{id}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');

Route::put('/vehiculos/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');

Route::resource('documentacion', DocumentacionController::class);

Route::get('documentacion/create/{vehiculo}', [DocumentacionController::class, 'create'])->name('documentacion.create');

Route::get('vehiculos/{vehiculoId}/documentacion/create', [DocumentacionController::class, 'create'])->name('documentacion.create');
