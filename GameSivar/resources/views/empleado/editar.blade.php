
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleado</title>
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <br>
    <h1 class="text-center text-2xl font-bold mb-4">Editar empleado</h1>
    <div class="container mx-auto p-4">
    <form action="{{ route('empleado.actualizar', $empleado->idEmpleado) }}" method="POST" class="max-w-xs mx-auto">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $empleado->Nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ $empleado->Apellido }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="fecha_contratacion" class="block text-gray-700 text-sm font-bold mb-2">Fecha de contratación:</label>
            <input type="date" name="fecha_contratacion" id="fecha_contratacion" value="{{ $empleado->FechaContratacion }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="fecha_nacimiento" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $empleado->FechaNacimiento }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="{{ $empleado->Telefono }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="flex items-center justify-center mt-4">
            <input type="submit" value="Actualizar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
        </div>
    </form>
    </div>
   
    <div class="flex items-center justify-center">
        <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">Regresar</a>
    </div>
   
</body>
</html>