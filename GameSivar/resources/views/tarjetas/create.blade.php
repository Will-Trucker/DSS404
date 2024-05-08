<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tarjetas</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Puntos</a>
              </li>
              <li>                
                <a href="{{route('tarjetas.create')}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Crear Tarjetas</a></li>

            </ul>
          </div>
        </div>
      </nav>
   
    <div class="flex justify-center items-center h-screen w-full ">
        <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Registrar Tarjetas</h1>
            <form method="post" id="crearTarjetaForm" action="{{route('tarjetas.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="first_name">Cliente</label>
                    <select class="border py-2 px-3 text-grey-800" type="text" name="users_id" id="users_id" value="{{old('users_id')}}">
                        <option value="">Seleccione un Cliente</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('users_id')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                       
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="last_name">Tipo Tarjeta</label>
                    <select name="tipo" id="tipo" class="border py-2 px-3 text-grey-800" value="{{old('tipo')}}">
                        <option value="">Seleccion un Tipo de Tarjeta</option>
                        <option value="Plus">Plus</option>
                        <option value="Gold">Gold</option>
                        <option value="Silver">Silver</option>
                    </select>
                    @error('tipo')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="CostoTarjeta">Monto</label>
                    <input class="border py-2 px-3 text-grey-800" type="number" name="costo" id="costo" step="50" min="50" max="300" placeholder="$" value="{{old('costo')}}">
                    @error('costo')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="Vencimiento">Vencimiento</label>
                    <input class="border py-2 px-3 text-grey-800" type="date" name="vencimiento" id="vencimiento" min="05-05-2024" value="{{old('vencimiento')}}">
                    @error('vencimiento')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="Saldo">Saldo</label>
                  <input class="border py-2 px-3 text-grey-800" type="number" name="saldo" id="saldo" step="1.00" min="10" placeholder="$" value="{{old('saldo')}}">
                  @error('saldo')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="Limite">Limite</label>
                  <input class="border py-2 px-3 text-grey-800" type="number" name="limite" id="limite" step="1.00" min="10" placeholder="$" value="{{old('limite')}}">
                  @error('limite')
                  <p class="text-red-500">{{ $message }}</p>
                  @enderror
                </div>
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="EstadoTarjeta">Estado Tarjeta</label>
                  <select name="estado" id="estado" class="border py-2 px-3 text-grey-800" value="{{old('estado')}}">
                      <option value="">Estado de Tarjeta</option>
                      <option value="Activa">Activa</option>
                      <option value="Desactivada">Desactivada</option>
                  </select>
                  @error('estado')
                  <p class="text-red-500">{{ $message }}</p>
                  @enderror
              </div>
                <button class="block bg-teal-400 hover:bg-teal-600 text-white uppercase text-lg mx-auto p-4 rounded"
                    type="submit">Guardar</button>
            </form>
        </div>
    </div>
    <script>
      document.getElementById("vencimiento").addEventListener("change", function() {
          var fechaVencimiento = new Date(this.value); // Convertimos el valor del input a objeto Date
          var fechaActual = new Date(); // Obtenemos la fecha actual
          
          // Comparamos las fechas
          if (fechaVencimiento < fechaActual) {
              alert("La fecha de vencimiento debe ser igual o posterior a la fecha actual.");
              this.value = ""; // Limpiamos el valor del input
          }
      });
    </script>
</body>

</html>
