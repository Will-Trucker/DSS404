<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaJuego; 

class JuegoController extends Controller
{
    // Método para mostrar todos los juegos
    public function index()
    {
        return view('juegos.categoria-juegos');
    }

    // Método para mostrar un juego específico
    public function juego()
    {

        return view('juegos.juego');
    }

    // Método para mostrar todas las categorías de juegos
    public function mecanicos()
    {

        return view('juegos.mecanicos');
    }
    public function electronicos()
    {

        return view('juegos.electronicos');
    }
}
