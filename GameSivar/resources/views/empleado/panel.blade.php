<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel | empleado</title>
    <!-- Agregar enlace para importar Tailwind CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/PurpleBadgeAcademyLogo.png">

</head>

<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Info de clientes</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID Cliente</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Apellido</th>
                    <th class="px-4 py-2">Puntos Gastados</th>
                    <th class="px-4 py-2">Monto Gastado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $cliente)
                <tr>
                    <td class="border px-4 py-2">{{ $cliente->id }}</td>
                    <td class="border px-4 py-2">{{ $cliente->name }}</td>
                    <td class="border px-4 py-2">{{ $cliente->lastname }}</td>
                    <td class="border px-4 py-2">{{ $cliente->expediente->PuntosGastados }}</td>
                    <td class="border px-4 py-2">{{ $cliente->expediente->MontoGastado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <div class="flex items-center justify-center">
        <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">Regresar</a>
    </div>
    

</body>

</html>
