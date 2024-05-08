<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\AdminController;




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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categoria-juegos', 'CategoriasController@mostrarCategoriaJuegos')->name('categoria-juegos');

Route::get('/tarjetas/index',[TarjetaController::class,'index'])->name('tarjetas.index');
Route::get('/tarjetas/create',[TarjetaController::class,'create'])->name('tarjetas.create');
Route::post('/tarjetas/store',[TarjetaController::class,'store'])->name('tarjetas.store');
Route::get('/tarjetas/asignPoints/{userId}/{tarjetaId}',[TarjetaController::class,'asignPoints'])->name('tarjetas.asignPoints');
Route::post('/tarjetas/asignPoints/storePoints/{userId}/{tarjetaId}',[TarjetaController::class,'storePoints'])->name('tarjetas.storePoints');
// Route::get('/tarjetas/deletePoints/{userId}/',[TarjetaController::class,'deletePoints'])->name('tarjetas.deletePoints');
Route::get('/tarjetas/edit/{userId}/{tarjetaId}', [TarjetaController::class,'editPoints'])->name('tarjetas.edit');
Route::post('/tarjetas/{userId}/{tarjetaId}', [TarjetaController::class,'updatePoints'])->name('tarjetas.update');
Route::delete('/tarjetas/{userId}/{tarjetaId}', [TarjetaController::class,'destroy'])->name('tarjetas.destroy');
Route::get('/tarjetas/list',[TarjetaController::class,'listaP'])->name('tarjetas.listaP');

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

// Rutas para tarjetas
Route::prefix('tarjetas')->middleware(['auth'])->group(function () {
    Route::get('/index', [TarjetaController::class, 'index'])->name('tarjetas.index');
    Route::get('/create', [TarjetaController::class, 'create'])->name('tarjetas.create');
    Route::post('/store', [TarjetaController::class, 'store'])->name('tarjetas.store');
    Route::get('/asignPoints/{userId}/{tarjetaId}', [TarjetaController::class, 'asignPoints'])->name('tarjetas.asignPoints');
    Route::post('/asignPoints/storePoints/{userId}/{tarjetaId}', [TarjetaController::class, 'storePoints'])->name('tarjetas.storePoints');
    Route::get('/edit/{userId}/{tarjetaId}', [TarjetaController::class, 'editPoints'])->name('tarjetas.edit');
    Route::post('/{userId}/{tarjetaId}', [TarjetaController::class, 'updatePoints'])->name('tarjetas.update');
});

// Rutas para empleados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/empleado', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleado.index');
    Route::post('/registrar-empleado', [EmpleadoController::class, 'registrar'])->name('empleado.registrar');
    Route::get('/empleado/editar/{id}', [EmpleadoController::class, 'editar'])->name('empleado.editar');
    Route::put('/empleado/actualizar/{id}', [EmpleadoController::class, 'actualizar'])->name('empleado.actualizar');
    Route::get('/empleado/panel', [EmpleadoController::class, 'panel'])->name('empleado.panel');
});

Route::get('/juegos/categorias', [JuegoController::class, 'index'])->name('juegos.index');
Route::get('/juegos', [JuegoController::class, 'juego'])->name('juegos.juego');
Route::get('/juegos-electronicos', [JuegoController::class, 'electronicos'])->name('juegos.electronicos');
Route::get('/juegos-mecanicos', [JuegoController::class, 'mecanicos'])->name('juegos.mecanicos');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/users', [UserAdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
