<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Puntos Asociados a Tarjetas</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('images/PurpleBadgeAcademyLogo.png')}}">
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="{{asset('images/PurpleBadgeAcademyLogo.png')}}" class="h-8" alt="Flowbite Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">GamesSivar</span>
          </a>
          <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
          <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
              <li>
                <a href="{{route('tarjetas.index')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
              </li>
              <li>
                <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500">Puntos</a>
              </li>
              <li>                
                <a href="{{route('tarjetas.create')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Crear Tarjetas</a></li>

            </ul>
          </div>
        </div>
      </nav>
      <div class="flex justify-center items-center h-screen w-full " style="margin-top: -4rem">
              

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="with: 120%;height:20rem;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Cliente
                        </th>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Saldo
                        </th>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Limite
                        </th>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Tipo
                        </th> 
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Monto
                        </th>
                        <th scope="col" class="px-6 py-3" style="color:white;">
                            Puntos
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tarjetas as $tarjeta)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" style="color:white;">
                        <td class="px-6 py-4">{{ $tarjeta->usuario->name }}</td>
                        <td class="px-6 py-4">{{ $tarjeta->codigo }}</td>
                        <td class="px-6 py-4">{{ $tarjeta->saldo }}</td>
                        <td class="px-6 py-4">{{ $tarjeta->limite }}</td>
                        <td class="px-6 py-4">{{ $tarjeta->tipo }}</td>
                        <td class="px-6 py-4">{{ $tarjeta->costo }}</td>
                        <td class="px-6 py-4">
                            @if($tarjeta->puntos)
                                {{ $tarjeta->puntos->cantidadP }}
                            @else
                                Sin puntos asignados
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
      <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>