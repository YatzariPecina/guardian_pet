<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Detalles Veterinario</title>
</head>

<body class="h-screen bg-white flex flex-col items-center">
    <header class="bg-[#24CE6B] w-full flex justify-between items-center px-12 py-4 relative">
        <div class="flex items-center space-x-6">
            <a href="/inicio"> 
                <img src="{{ asset('img/logo_guardian_pet.png') }}"  alt="Guardian Pet Logo" class="w-8 h-8 object-contain">
            </a>
            <a href="/inicio" class="text-xs font-bold text-black">Guardian Pet</a> 
        </div>
        <nav class="flex space-x-12">
            <a href="/CrudMascota" class="text-black font-semibold hover:underline">Mascotas</a>
            <a href="/CrudCitas" class="text-black font-semibold hover:underline">Recordatorios</a>
            <a href="{{ route('veterinario.index') }}" class="text-black font-semibold hover:underline">Mis veterinarios</a>
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

    <main class="w-full max-w-screen-lg">

        <!-- Contenedor para ser dividido -->
        <div class="flex justify-between">

            <!-- Columna Izquierda -->
            <div class="w-1/2 bg-green-100 flex flex-col items-center"> <!-- Añadido 'flex flex-col items-center' -->
                <!-- Header con la foto y calificaciones de la veterinaria -->
                <div class="flex items-center mt-8 m-2">
                    <!-- Imagen de la veterinario con margen -->
                    <div class="w-full h-full rounded-md overflow-hidden mx-2"> 
                        <img src="/img/VET1.png" alt="Mascota" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="w-1/2 mt-8 mx-4">
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('veterinario.index') }}" class="text-2xl">
                        <img src="{{ asset('img/regresar.png') }}" alt="Back arrow" class="w-6 h-6">
                    </a>

                    <h1 class="text-2xl font-bold text-center flex-grow">{{ $veterinario->nombre }}</h1>
                </div>

                <!-- Línea pa dividir-->
                <hr class="my-4 border-gray-300">

                <!-- Servicios que ofrece -->
                <div class="mb-6">
                    <div>
                        <p class="text-justify">
                            {{ $veterinario->descripcion }}
                        </p>

                        <h4 class="font-semibold mt-2">Ubicación: </h4>
                        <p>
                            {{ $veterinario->ubicacion }}
                        </p>

                        <h4 class="font-semibold mt-2">Horario: </h4>
                        <p>{{ $veterinario->horario }}</p>
                    </div>
                </div>

                <!-- Línea pa dividir este pedo <- Gracias Luisana -->
                <hr class="my-4 border-gray-300">

                <!-- Datos de contacto -->
                <div>
                    <h3 class="text-lg font-semibold">Contacto:</h3>
                    <div class="space-y-1">
                        <p class="font-semibold"><b>Veterinario:</b> {{ $veterinario->nombre }}</p>
                        <p class="font-semibold"><b>Especialidad:</b></p>
                        <p class="font-semibold"><b>Telefono:</b>{{ $veterinario->telefono }}</p>
                        <p class="font-semibold"><b>Correo electronico:</b></p>
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

        function changeButtonText() {
            var button = document.getElementById('addVetButton');
            button.textContent = "Agregado";
            button.disabled = true; // Opcional: Deshabilita el botón después de agregar
            button.classList.remove('hover:bg-[#e9bb2250]'); // Opcional: Elimina el hover
        }
    </script>
</body>

</html>
