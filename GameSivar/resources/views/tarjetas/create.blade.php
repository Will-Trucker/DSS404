<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tarjetas</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <nav class="flex items-center justify-between flex-wrap bg-teal-800 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">

                <span class="font-semibold text-xl tracking-tight">GameSivar</span>
            </div>
            <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="#responsive-header"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Asignar Puntos
                    </a>
                    <a href="#responsive-header"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Quitar Puntos
                    </a>
                </div>
                <div>
                    <a href="{{ route('tarjetas.index') }}"
                        class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Crear
                        Volver a Inicio</a>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>
    <br>
    <br>
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
