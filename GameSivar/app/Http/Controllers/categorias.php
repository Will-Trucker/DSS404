<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categorias extends Controller
{
    public function mostrarCategoriaJuegos()
    {
        return view('juegos.categoria-juegos');
    }
}
