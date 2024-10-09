<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Crud Citas</title>
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
            <a href="/CrudVeterinarios" class="text-black font-semibold hover:underline">Veterinarios</a>
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

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="/inicio" class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a>

            <h1 class="text-3xl font-bold text-center flex-grow">Próximas Citas</h1>
        </div>

        <!-- Barra de búsqueda de citas-->
        <div class="flex justify-center mb-4">
            <div class="flex items-center border border-gray-400 rounded-lg p-2 w-2/3">
                <input type="text" class="flex-grow outline-none px-2" placeholder="Buscar cita...">
                <button>
                    <img src="img/buscar.png" alt="Buscar icon" class="w-6 h-6">
                </button>
            </div>
        </div>

        <!-- Línea pa dividir -->
        <hr class="my-4 border-gray-300">

        <!-- Botón de nuevo registro -->
        <div class="flex justify-start mb-4">
            <button class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg hover:bg-[#e9bb2291]"
                onclick="window.location.href='/RegistroCita'">
                Nuevo registro
            </button>
        </div>


        <!-- Tarjetas de citas -->
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="bg-[#ADDABE] p-4 rounded-lg flex justify-between items-center">
                <div class="flex-grow">
                    <p class="text-black">Cita 1</p>
                    <p class="text-black">Fecha</p>
                    <p class="text-black">Hora</p>
                </div>
                <div class="flex space-x-2">
                    <button><img src="img/mirar.png" alt="Ver" class="w-5 h-5"></button>
                    <button><img src="img/editar.png" alt="Editar" class="w-5 h-5"></button>
                    <button><img src="img/eliminar.png" alt="Eliminar" class="w-5 h-5"></button>
                </div>
            </div>
            <div class="bg-[#ADDABE] p-4 rounded-lg flex justify-between items-center">
                <div class="flex-grow">
                    <p class="text-black">Cita 2</p>
                    <p class="text-black">Fecha</p>
                    <p class="text-black">Hora</p>
                </div>
                <div class="flex space-x-2">
                    <button><img src="img/mirar.png" alt="Ver" class="w-5 h-5"></button>
                    <button><img src="img/editar.png" alt="Editar" class="w-5 h-5"></button>
                    <button><img src="img/eliminar.png" alt="Eliminar" class="w-5 h-5"></button>
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
