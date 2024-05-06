<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarjetaJuego;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class TarjetaController extends Controller
{
    public function index(){
        return view('tarjetas.index');
    }

    public function create()
{
    $clientes = Cliente::all(); // Obtener todos los clientes
    return view('tarjetas.create', compact('clientes'));
}

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'clientes_id' => 'required',
            'tipo' => 'required',
            'costo' => 'required|numeric',
            'vencimiento' => 'required|date|after_or_equal:today',
            'saldo' => 'required|numeric',
            'limite' => 'required|numeric',
            'estado' => 'required'
        ], [
            'clientes_id.required' => 'El campo cliente es obligatorio.',
            'tipo.required' => 'El campo tipo de tarjeta es obligatorio.',
            'costo.required' => 'El campo costo de tarjeta es obligatorio.',
            'costo.numeric' => 'El campo costo de tarjeta debe ser un valor numérico.',
            'vencimiento.required' => 'El campo vencimiento es obligatorio.',
            'vencimiento.date' => 'El campo vencimiento debe ser una fecha válida.',
            'vencimiento.after_or_equal' => 'El campo vencimiento debe ser igual o posterior a la fecha actual.',
            'saldo.required' => 'El campo saldo es obligatorio.',
            'saldo.numeric' => 'El campo saldo debe ser un valor numérico.',
            'limite.required' => 'El campo límite es obligatorio.',
            'limite.numeric' => 'El campo límite debe ser un valor numérico.',
            'estado.required' => 'El campo de Estado de Tarjeta es obligatorio'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $tipoTarjeta = $request->input('tipo');
        $costoTarjeta = $request->input('costo');
    
        if (($tipoTarjeta == 'Plus' && $costoTarjeta != 50) ||
            ($tipoTarjeta == 'Silver' && $costoTarjeta != 150) ||
            ($tipoTarjeta == 'Gold' && $costoTarjeta != 300)) {
            return redirect()->back()->withInput()->withErrors(['costo' => 'El costo de la tarjeta no es válido para el tipo seleccionado.']);
        }
    
        $saldo = $request->input('saldo');
        $limite = $request->input('limite');
    
        if ($limite > $saldo) {
            $validator->errors()->add('limite', 'El límite no puede ser mayor que el saldo.');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $tarjeta = new TarjetaJuego();
        $tarjeta->clientes_id = $request->clientes_id;
        $tarjeta->codigo = $this->generateUniqueCode();
        $tarjeta->tipo = $request->tipo;
        $tarjeta->costo = $request->costo;
        $tarjeta->vencimiento = $request->vencimiento;
        $tarjeta->saldo = $saldo;
        $tarjeta->limite = $limite;
        $tarjeta->estado = $request->estado;
        $tarjeta->save();
    
        return redirect()->route('tarjetas.index')->with('success', 'La Tarjeta ha sido registrada');

    }

    protected function generateUniqueCode()
    {
    do {
        $codigo = mt_rand(1000000000000000, 9999999999999999);
    } while (TarjetaJuego::where('codigo', $codigo)->exists());

    return $codigo;
}
}
