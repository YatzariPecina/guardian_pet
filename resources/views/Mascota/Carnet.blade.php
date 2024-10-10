<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Carnet</title>
</head>

<body class="h-screen bg-white flex flex-col items-center">
    <header class="bg-[#24CE6B] w-full flex justify-between items-center px-12 py-4 relative">
        <div class="flex items-center space-x-6">
            <img src="{{ asset('img/logo_guardian_pet.png') }}" alt="Guardian Pet Logo" class="w-8 h-8 object-contain">
            <h1 class="text-xs font-bold text-black">Guardian Pet</h1>
        </div>
        <nav class="flex space-x-12">
            <a href="/CrudMascota" class="text-black font-semibold hover:underline">Mascotas</a>
            <a href="/CrudCitas" class="text-black font-semibold hover:underline">Recordatorios</a>
            <a href="/CrudVeterinarios" class="text-black font-semibold hover:underline">Veterinarios</a>
        </nav>
        <div class="relative">
            <img src="{{ asset('img/user.png') }}" alt="User Icon" class="w-6 h-6 cursor-pointer" id="userIcon">
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del
                    perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar
                    sesión</a>
            </div>
        </div>
    </header>

    <main class="w-full max-w-screen-lg mt-8 px-4">

        <div class="flex items-center justify-between mb-4">
            <a href="/inicio" class="text-2xl">
                <img src="{{ asset('img/regresar.png') }}" alt="Back arrow" class="w-6 h-6">
            </a>

            <h1 class="text-3xl font-bold text-center flex-grow">Cheto</h1>
        </div>

        <!-- Contenedor para ser dividido -->
        <div class="flex justify-between">

            <!-- Columna Izquierda -->
            <div class="w-1/2">
                <!-- Header con la foto y nombre de la mascota -->
                <div class="flex items-center mb-2">
                    <!-- Imagen de la mascota -->
                    <div class="w-64 h-64 rounded-md overflow-hidden">
                        <img src="{{ asset('storage/' . $mascota->foto) }}" alt="Mascota {{ $mascota->nombre }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Detalles de la mascota -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Detalles de la mascota:</h3>
                    <div class="space-y-1">
                        <p><span class="font-semibold">Especie:</span> {{ $mascota->especie }}</p>
                        <p><span class="font-semibold">Raza:</span> {{ $mascota->raza }}</p>
                        <p><span class="font-semibold">Sexo:</span> {{ $mascota->sexo }}</p>
                        <p><span class="font-semibold">Edad:</span> {{ $mascota->edad }} años</p>
                        <p><span class="font-semibold">Características:</span> {{ $mascota->caracteristicas }}</p>
                    </div>
                </div>

                <!-- Botón Editar Mascota -->
                <div class="mt-2 mb-5">
                    <button type="submit"
                        class="bg-[#E9CF22] hover:bg-[#e9bb2250] text-black font-semibold py-2 px-6 rounded-lg"
                        onclick="window.location.href='/EditarDatos/{{ $mascota->id }}'">
                        Editar mascota
                    </button>
                </div>


                <!-- Columna Derecha -->
                <div class="w-full">
                    <!-- Próxima cita o vacuna -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Próxima cita o vacuna:</h3>
                        <div class="space-y-4 mt-2">
                            <!-- Primera Cita -->
                            <div class="bg-green-100 p-4 rounded-lg flex justify-between items-center">
                                <div class="flex-grow">
                                    <p class="text-black">Cita 1</p>
                                    <p class="text-black">Fecha</p>
                                    <p class="text-black">Hora</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button><img src="{{ asset('img/mirar.png') }}" alt="Ver"
                                            class="w-5 h-5"></button>
                                    <button><img src="{{ asset('img/editar.png') }}" alt="Editar"
                                            class="w-5 h-5"></button>
                                    <button><img src="{{ asset('img/eliminar.png') }}" alt="Eliminar"
                                            class="w-5 h-5"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Línea pa dividir este pedo <- Gracias Luisana -->
                    <hr class="my-4 border-gray-300">

                    <!-- Vacunas -->
                    <div>
                        <h3 class="text-lg font-semibold">Vacunas:</h3>
                        <div class="space-y-4 bg-blue-100 p-4 rounded-md mt-1">
                            <p class="font-semibold"><b>Vacuna 1</b> - 05/09/2024 - Vacuna Hpetavalente + Leptospira</p>
                            <p class="font-semibold"><b>Vacuna 2</b> - 16/09/2024 - Nobivac Parvo C</p>
                            <p class="font-semibold"><b>Vacuna 2</b> - 23/09/2024 - Vacuna Antirrábica Mérieux</p>
                        </div>
                    </div>
                </div>

            </div>

    </main>


    <script>
        const userIcon = document.getElementById('userIcon');
        const dropdownMenu = document.getElementById('dropdownMenu');

        userIcon.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!userIcon.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
