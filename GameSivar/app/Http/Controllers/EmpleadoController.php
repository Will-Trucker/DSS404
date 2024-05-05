<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
{
    $empleados = Empleado::all();
    return view('empleado.index', compact('empleados'));
}


    public function registrar(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:9', // ajustado para coincidir con el maxlength en el formulario
        ]);

        // Crea un nuevo empleado con los datos del formulario
        $empleado = new Empleado();
        $empleado->Nombre = $request->nombre;
        $empleado->Apellido = $request->apellido;
        $empleado->FechaContratacion = $request->fecha_contratacion;
        $empleado->FechaNacimiento = $request->fecha_nacimiento;
        $empleado->Telefono = $request->telefono;

        // Guarda el nuevo empleado en la base de datos
        $empleado->save();

        // Redirige a una ruta de éxito o muestra un mensaje de éxito
        return redirect()->route('empleado.index')->with('success', 'Empleado registrado correctamente.');
    }

    public function editar($id)
{
    $empleado = Empleado::findOrFail($id);
    return view('empleado.editar', compact('empleado'));
}

public function actualizar(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha_contratacion' => 'required|date',
        'fecha_nacimiento' => 'required|date',
        'telefono' => 'required|string|max:9',
    ]);

    $empleado = Empleado::findOrFail($id);
    $empleado->Nombre = $request->nombre;
    $empleado->Apellido = $request->apellido;
    $empleado->FechaContratacion = $request->fecha_contratacion;
    $empleado->FechaNacimiento = $request->fecha_nacimiento;
    $empleado->Telefono = $request->telefono;
    $empleado->save();

    return redirect()->route('empleado.index')->with('success', 'Empleado actualizado correctamente.');
}

}
