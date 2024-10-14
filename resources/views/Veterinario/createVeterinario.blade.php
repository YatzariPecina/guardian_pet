<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Nuevo veterinario</title>
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

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="{{ url()->previous() }}" class="text-2xl">
                <img src="{{ asset('img/regresar.png') }}" alt="Back arrow" class="w-6 h-6">
            </a>
            <h1 class="text-3xl font-bold text-center flex-grow">Nuevo veterinario</h1>
        </div>

        <!-- Formulario de registro de mascota -->
        <form class="grid grid-cols-2 gap-6" method="POST" enctype="multipart/form-data" action="{{ route('mascotas.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del veterinario:</label>
                <input type="text" id="nombre" name="nombre"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Nombre del veterinario" required>
            </div>
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Descripción" min="0" required>
            </div>
            <div>
                <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Ubicacion" required>
            </div>
            <div>
                <label for="horario" class="block text-sm font-medium text-gray-700">Horario:</label>
                <input type="text" id="horario" name="horario"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Horario" required>
            </div>
            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono:</label>
                <input type="text" id="telefono" name="telefono"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Telefono" required>
            </div>
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Subir foto del local:</label>
                <input type="file" id="foto" name="foto" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#24CE6B] file:text-white hover:file:bg-green-500"
                    required>
            </div>

            <!-- Botón de registro -->
            <div class="col-span-2 flex justify-center mt-6">
                <button type="submit"
                    class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg hover:bg-[#e9bb2291]">
                    Registrar veterinario
                </button>
            </div>
        </form>
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
