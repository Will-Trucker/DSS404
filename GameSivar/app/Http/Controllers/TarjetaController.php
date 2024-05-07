<?php

namespace App\Http\Controllers;

use App\Models\TarjetaPunto;
use Illuminate\Http\Request;
use App\Models\TarjetaJuego;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TarjetaController extends Controller
{
    public function index()
    {
        $tarjetas = TarjetaJuego::all();
        if($tarjetas->isEmpty()){
            return redirect()->route('error')->with('message','No hay tarjetas disponibles');
        }
        return view('tarjetas.index',compact('tarjetas'));
    }

    public function create()
    {
        $users = User::all(); // Obtener todos los clientes
        return view('tarjetas.create', compact('users'));
    }

    public function store(Request $request)
    {
        // validaciones
        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
            'tipo' => 'required',
            'costo' => 'required|numeric',
            'vencimiento' => 'required|date|after_or_equal:today',
            'saldo' => 'required|numeric',
            'limite' => 'required|numeric',
            'estado' => 'required'
        ], [
            'users_id.required' => 'El campo cliente es obligatorio.',
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

        // si existe un error no hara la transaccion a la db
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tipoTarjeta = $request->input('tipo');
        $costoTarjeta = $request->input('costo');

        // Si no cumple el costo definido para los tipos de tarjetas
        if (($tipoTarjeta == 'Plus' && $costoTarjeta != 50) || ($tipoTarjeta == 'Silver' && $costoTarjeta != 150) ||
            ($tipoTarjeta == 'Gold' && $costoTarjeta != 300)
        ) {
            return redirect()->back()->withInput()->withErrors(['costo' => 'El costo de la tarjeta no es válido para el tipo seleccionado.']);
        }

        $saldo = $request->input('saldo');
        $limite = $request->input('limite');

        // Si el limite es mayor que el saldo
        if ($limite > $saldo) {
            $validator->errors()->add('limite', 'El límite no puede ser mayor que el saldo.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtenemos los campos y su envio se haga por request
        $tarjeta = new TarjetaJuego();
        $tarjeta->users_id = $request->users_id;
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



    public function asignPoints($userId)
{
    $user = User::findOrFail($userId);
    $tarjetas = TarjetaJuego::where('users_id', $userId)->get();
    return view('tarjetas.asignPoints', compact('user', 'tarjetas'));
}

    public function storePoints(Request $request){
        $rules = [
            'users_id' => 'required',
            'tarjeta_juegos_id' => 'required',
            'cantidadP' => 'required|numeric'
        ];

        $messages = [
            'users_id.required' => 'El campo Cliente es requerido',
            'tarjeta_juegos_id.required' => 'El campo es Tarjeta Juego es requerido',
            'cantidadP.required' => 'El campo Cantidad Puntos es requerido',
            'cantidadP.numeric' => 'El campo solo acepta valores númericos'
        ] ;

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tarjetas = new TarjetaPunto;
        $tarjetas->users_id = $request->users_id;
        $tarjetas->tarjeta_juegos_id = $request->tarjeta_juegos_id;
        $tarjetas->cantidadP = $request->cantidadP;
        $tarjetas->save();

        return redirect()->route('tarjetas.index')->with('success','Asignacion de Puntos Existosamente');
    }

    public function editPoints($userId)
{
    $tarjetaPunto = TarjetaPunto::findOrFail($userId);
    $user = User::findOrFail($tarjetaPunto->users_id);
    $tarjetas = TarjetaJuego::where('users_id', $tarjetaPunto->users_id)->get();
    return view('tarjetas.deletePoints', compact('tarjetaPunto', 'user', 'tarjetas'));
}

    public function updatePoints(Request $request, $userId)
{
    $rules = [
        'cantidadP' => 'required|numeric'
    ];

    $messages = [
        'cantidadP.required' => 'El campo Cantidad Puntos es requerido',
        'cantidadP.numeric' => 'El campo solo acepta valores númericos'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $tarjetaPunto = TarjetaPunto::findOrFail($userId);
    $tarjetaPunto->cantidadP = $request->cantidadP;
    $tarjetaPunto->save();

    return redirect()->route('tarjetas.index')->with('success', 'Puntos actualizados exitosamente');
}

    // Generacion de cadena de numeros aleatorio para asignar tarjetas de jueegos
    protected function generateUniqueCode()
    {
        do {
            $codigo = mt_rand(1000000000000000, 9999999999999999);
        } while (TarjetaJuego::where('codigo', $codigo)->exists());

        return $codigo;
    }


}
