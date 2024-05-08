@vite('resources/css/app.css')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POC WCS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body class="bg-gray-200 lg:flex">
    <nav class="bg-white border-b border-gray-300">
        <div class="flex justify-between items-center px-9">
            <!-- Ícono de Menú -->
            <button id="menu-button" class="lg:hidden">
                <i class="fas fa-bars text-cyan-500 text-lg"></i>
            </button>
            <!-- Logo -->
            <div class="ml-1">
                <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="logo" class="h-20 w-28">
            </div>

            <!-- Ícono de Notificación y Perfil -->
            <div class="space-x-4">
                <button>
                    <i class="fas fa-bell text-cyan-500 text-lg"></i>
                </button>

                <!-- Botón de Perfil -->
                <button>
                    <i class="fas fa-user text-cyan-500 text-lg"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Barra lateral -->
    <div id="sidebar" class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none">
        <!-- Items -->
        <div class="p-4 space-y-4">
            <!-- Inicio -->
            <a href="#" aria-label="dashboard" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fas fa-home"></i>
                <span class="-mr-1 font-medium">Inicio</span>
            </a>
            <a href="#" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                <i class="fas fa-gift"></i>
                <span>Recompensas</span>
            </a>
            </a>
            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fas fa-store"></i>
                <span>Sucursalses</span>
            </a>

            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fas fa-wallet"></i>
                <span>Billetera</span>
            </a>
            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fas fa-exchange-alt"></i>
                <span>Transacciones</span>
            </a>
            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fas fa-user"></i>
                <span>Mi cuenta</span>
            </a>
            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerrar sesión</span>
        </a>
        </div>
    </div>

    <div class="lg:w-full lg:ml-64 px-6 py-8">

        <!-- Buscador -->


<!-- Tabla -->
<div class="bg-white rounded-lg p-4 shadow-md my-4">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left border-b-2 w-full">
                    <h2 class="text-2xl font-bold text-gray-600">Tabla de Usuarios</h2>
                </th>
            </tr>
        </thead>
        <tbody>
                <td class="px-4 py-2 text-left align-top w-1/2 text-lg">
                    <div>
                        <div class="overflow-x-auto text-white">
                            <table class="table">
                              <!-- head -->
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Telefono</th>
                                  <th>Fecha</th>
                                  <th>Email</th>
                                  <th>Fecha de creacion</th>
                                  <th>Fecha de modificacion</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->birth }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                    </div>
                </td>
        </tbody>
    </table>
</div>
 </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>

</html>