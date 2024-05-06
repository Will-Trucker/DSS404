<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarjetaController;

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

Route::get('/tarjetas/index',[TarjetaController::class,'index'])->name('tarjetas.index');

Route::get('/tarjetas/create',[TarjetaController::class,'create'])->name('tarjetas.create');

Route::post('/tarjetas/store',[TarjetaController::class,'store'])->name('tarjetas.store');

