<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego; // Asegúrate de importar el modelo Juego si aún no lo has hecho
use App\Models\CategoriaJuego; // Asegúrate de importar el modelo CategoriaJuego si aún no lo has hecho

class JuegoController extends Controller
{
    // Método para mostrar todos los juegos
    public function index()
    {
        $juegos = Juego::all();
        return view('juegos.index', compact('juegos'));
    }

    // Método para mostrar un juego específico
    public function show($id)
    {
        $juego = Juego::findOrFail($id);
        return view('juegos.show', compact('juego'));
    }

    // Método para mostrar todas las categorías de juegos
    public function mostrarCategorias()
    {
        $categorias = CategoriaJuego::all();
        return view('juegos.categoria-juegos', compact('categorias'));
    }
}
