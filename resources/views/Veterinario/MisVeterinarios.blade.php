<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Mis veterinarios</title>
</head>

<body class="h-screen bg-white flex flex-col items-center">
    <header class="bg-[#24CE6B] w-full flex justify-between items-center px-12 py-4 relative">
        <div class="flex items-center space-x-6">
            <img src="img/logo_guardian_pet.png" alt="Guardian Pet Logo" class="w-8 h-8 object-contain">
            <h1 class="text-xs font-bold text-black">Guardian Pet</h1>
        </div>
        <nav class="flex space-x-12">
            <a href="/CrudMascota" class="text-black font-semibold hover:underline">Mascotas</a>
            <a href="/CrudCitas" class="text-black font-semibold hover:underline">Recordatorios</a>
            <a href="{{ route('veterinario.index') }}" class="text-black font-semibold hover:underline">Mis veterinarios</a>
        </nav>
        <div class="relative">
            <img src="img/user.png" alt="User Icon" class="w-6 h-6 cursor-pointer" id="userIcon">
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del
                    perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar
                    sesión</a>
            </div>
        </div>
    </header>

    <!-- Contenido-->
    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="/inicio" class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a>
            <!-- Mis veterinarios -->
            <h1 class="text-3xl font-bold text-center flex-grow">Mis veterinarios</h1>
            <a href="{{ route('veterinario.create') }}"
                class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg text-center hover:bg-[#e9bb2291]">
                Añadir veterinario
            </a>
        </div>

        <!-- Línea pa dividir este pedo-->
        <hr class="my-4 border-gray-300">

        <!-- Veterinarios guardados -->
        <div>
            <!-- Mi Vet 1 -->
            <div class="bg-[#ADDABE] flex p-4 rounded-lg relative">
                <!-- Botón de cierre -->
                <button class="absolute top-2 right-2 mx-2 text-2xl text-red-600" onclick="removeVet(this)">
                    <i class="fas fa-times"></i> <!-- Icono de cerrar -->
                </button>

                <img src="img/VET1.png" alt="Dog 1" class="w-32 h-32 object-cover rounded-lg mr-4">
                <div class="flex-grow">
                    <h4 class="font-semibold mt-2">Nombre</h4>
                    <h4 class="font-semibold mt-2">Horario:</h4>
                    <p>Lunes a viernes: 8:00 a 20:00 horas<br>
                        Sábados: 8:00 a 15:00 horas</p>
                </div>

                <!-- Botones a la derecha del texto -->
                <div class="flex flex-col justify-between">
                    <p class="font-semibold mt-2">Acciones:</p>
                    <div class="flex flex-col space-y-2">
                        <button type="submit"
                            class="bg-[#E9CF22] hover:bg-[#e9bb2250] text-black font-semibold py-2 px-6 rounded-lg"
                            onclick="window.location.href='/DetallesVeterinario'">
                            Ver detalles
                        </button>
                        <button type="submit"
                            class="bg-[#E98222] hover:bg-[#e982229c] text-black font-semibold py-2 px-6 rounded-lg"
                            onclick="window.location.href='#'">
                            Opinar
                        </button>
                    </div>
                </div>
            </div>
        </div>

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

            function removeVet(button) {
                const vetContainer = button.closest('.relative');
                if (vetContainer) {
                    vetContainer.remove();
                }
            }
        </script>
