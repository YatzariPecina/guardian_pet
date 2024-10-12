<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Crud Veterinarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

            <h1 class="text-3xl font-bold text-center flex-grow">Veterinario</h1>
        </div>

        <!-- Barra de búsqueda de perros malcriados-->
        <div class="flex justify-center mb-4">

            <!-- Mis veterinarios -->
            <div class="flex justify-center mx-2">
                <a href="/MisVeterinarios"
                    class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg text-center hover:bg-[#e9bb2291]">
                    Mis Veterinarios
                </a>
            </div>

            <div class="flex items-center border border-gray-400 rounded-lg p-2 w-2/3">
                <input type="text" class="flex-grow outline-none px-2" placeholder="Buscar veterinarios...">
                <button>
                    <img src="img/buscar.png" alt="Buscar icon" class="w-6 h-6">
                </button>
            </div>
        </div>

        <!-- Línea pa dividir este pedo <- gracias a luisarna salas -->
        <hr class="my-4 border-gray-300">

        <!-- Tarjetas de mascotas -->
        <div class="grid grid-cols-3 gap-6">
            <!-- Vet 1 -->
            <div class="bg-[#ADDABE] p-4 rounded-lg mb-5">
                <p class="font-semibold text-center">Centro Veterinario 3 de Abril</p>
                <img src="img/VET1.png" alt="Vet 1" class="w-full h-40 object-cover rounded-lg mt-2">
                <div class="flex items-center justify-center mt-1">
                    <!-- Estrellas utilizando Font Awesome Icons, se agrego en el head -->
                    <div class="flex space-x-1 text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <!-- Calificación promedio -->
                    <p class="ml-2 text-black font-semibold text-lg">4.7</p>
                </div>
                <h3 class="text-black font-semibold mt-4">Ubicación: </h3>
                <p class="text-black text-justify">Ing. Américo Villarreal Guerra 38, Solidaridad Voluntad y Trabajo II,
                    87089 Cdad. Victoria, Tamps.</p>
                <h4 class="font-semibold mt-2">Horario:</h4>
                <p>Lunes a viernes: 8:00 a 20:00 horas<br>
                    Sábados: 8:00 a 15:00 horas
                </p>
                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="bg-[#E98222] hover:bg-[#e982229c] text-black font-semibold py-2 px-6 rounded-lg"
                        onclick="window.location.href='/DetallesVeterinario'">
                        Ver detalles
                    </button>
                </div>
            </div>
            <!--Vet 2 -->
            <div class="bg-[#ADDABE] p-4 rounded-lg mb-5">
                <p class="font-semibold text-center">Milmascotas Centro de Servicios Veterinarios</p>
                <img src="img/VET2.png" alt="Vet 2" class="w-full h-40 object-cover rounded-lg mt-2">
                <div class="flex items-center justify-center mt-1">
                    <!-- Estrellas utilizando Font Awesome Icons, se agrego en el head -->
                    <div class="flex space-x-1 text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <!-- Calificación promedio -->
                    <p class="ml-2 text-black font-semibold text-lg">4.0</p>
                </div>
                <h3 class="text-black font-semibold mt-4">Ubicación: </h3>
                <p class="text-black text-justify">Av Tamaulipas entre Conrado Castillo y Olivia Ramírez, Sierra Gorda,
                    87040 Cdad. Victoria, Tamps.</p>
                    <h4 class="font-semibold mt-2">Horario:</h4>
                    <p>Lunes a viernes: 9:00 a 20:30 horas<br>
                        Sábados: 8:00 a 14:00 horas
                    </p>
                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="bg-[#E98222] hover:bg-[#e982229c] text-black font-semibold py-2 px-6 rounded-lg"
                        onclick="window.location.href='/DetallesVeterinario'">
                        Ver detalles
                    </button>
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
