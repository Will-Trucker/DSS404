<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\EmpleadoController;

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
    return view('welcome');
});

Route::get('/index',[App\Http\Controllers\TarjetaController::class,'index'])->name('tarjetas.index');

Route::get('/empleado', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleado.index'); // con el name se hace el redireccionamiento en el controller 
Route::post('/registrar-empleado', [EmpleadoController::class, 'registrar'])->name('empleado.registrar');

Route::get('/empleado/editar/{id}', [EmpleadoController::class, 'editar'])->name('empleado.editar');
Route::put('/empleado/actualizar/{id}', [EmpleadoController::class, 'actualizar'])->name('empleado.actualizar');

Route::get('/empleado/panel', [EmpleadoController::class, 'panel'])->name('empleado.panel');
//Route::get('/empleado/login', [EmpleadoController::class, 'panel'])->name('login');

Route::get('/empleado/login', function () {
    return view('empleado.login');
})->name('empleado.login');

// Ruta para manejar la autenticación
Route::post('/empleado/login', [EmpleadoController::class, 'panel'])->name('empleado.login');
