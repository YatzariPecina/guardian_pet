<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro mascota</title>
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
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
            </div>
        </div>
    </header>          

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="/CrudMascota" class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a>            
            
            <h1 class="text-3xl font-bold text-center flex-grow">Nuevo registro</h1>
        </div>

        <!-- Formulario de registro de mascota -->
        <form class="grid grid-cols-2 gap-6">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la mascota:</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nombre de la mascota">
            </div>
            <div>
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad:</label>
                <input type="number" id="edad" name="edad" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Edad" min="0">
            </div>
            <div>
                <label for="especie" class="block text-sm font-medium text-gray-700">Especie:</label>
                <input type="text" id="especie" name="especie" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Especie">
            </div>
            <div>
                <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo:</label>
                <select id="sexo" name="sexo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>
            <div>
                <label for="raza" class="block text-sm font-medium text-gray-700">Raza:</label>
                <input type="text" id="raza" name="raza" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Raza">
            </div>
            <div>
                <label for="caracteristicas" class="block text-sm font-medium text-gray-700">Características:</label>
                <textarea id="caracteristicas" name="caracteristicas" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Características"></textarea>
            </div>
            <div class="col-span-2 -mt-6">
                <label for="foto" class="block text-sm font-medium text-gray-700">Subir foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#24CE6B] file:text-white hover:file:bg-green-500">
            </div>
        </form>

        <!-- Botón de registro -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg hover:bg-[#e9bb2291]">
                Registrar mascota
            </button>
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
