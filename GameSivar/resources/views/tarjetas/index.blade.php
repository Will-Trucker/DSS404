<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarjetas de Juegos</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="flex items-center justify-between flex-wrap bg-teal-800 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">

              <span class="font-semibold text-xl tracking-tight">GameSivar</span>
            </div>
            <div class="block lg:hidden">
              <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
              </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
              <div class="text-sm lg:flex-grow">
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                  Asignar Puntos
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                  Quitar Puntos
                </a>
              </div>
              <div>
                <a href="{{route('tarjetas.create')}}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Crear Tarjetas</a>
              </div>
            </div>
          </nav>
    </header>
    <div class="flex justify-center items-center h-screen w-full bg-blue-400">
      <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
          <!-- Mostrar mensaje de éxito si existe -->
          @if (session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
              <strong class="font-bold">¡Éxito!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
          </div>
          @endif

          <!-- Mostrar mensaje de error si existe -->
          @if (session('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
              <strong class="font-bold">¡Error!</strong>
              <span class="block sm:inline">{{ session('error') }}</span>
          </div>
          @endif

          <!-- Contenido principal de la página aquí -->
      </div>
  </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
