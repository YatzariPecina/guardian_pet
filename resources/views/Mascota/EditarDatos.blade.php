<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Editar datos</title>
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
            <a href="/MisVeterinarios" class="text-black font-semibold hover:underline">Mis veterinarios</a>
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

    <main class="w-full max-w-screen-lg mt-8 px-4 ">

        <div class="flex items-center justify-between mb-4">
            <a href="{{ url()->previous() }}" class="text-2xl">
                <img src="{{ asset('img/regresar.png') }}" alt="Back arrow" class="w-6 h-6">
            </a>

            <h1 class="text-3xl font-bold text-center flex-grow">Editar datos</h1>
        </div>

        <div class="flex justify-center">
            <!-- Formulario para actualizar todos los datos, incluyendo la foto -->
            <form action="{{ route('mascota.actualizar', $mascota->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full">
                @csrf

                <!-- Header con la foto y nombre de la mascota -->
                <div class="flex items-center mb-2">
                    <!-- Imagen de la mascota -->
                    <div class="w-64 h-64 rounded-md overflow-hidden">
                        <img src="{{ asset('storage/' . $mascota->foto) }}" alt="Mascota"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Botón cambiar foto -->
                <div class="col-span-2 mt-6">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Cambiar foto:</label>
                    <input type="file" id="foto" name="foto" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#24CE6B] file:text-white hover:file:bg-green-500">
                </div>


                <div class="grid gap-2">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Editar nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $mascota->nombre }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Nombre de la mascota">
                    </div>
                    <div>
                        <label for="edad" class="block text-sm font-medium text-gray-700">Editar edad:</label>
                        <input type="number" id="edad" name="edad" value="{{ $mascota->edad }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Edad" min="0">
                    </div>
                    <div>
                        <label for="especie" class="block text-sm font-medium text-gray-700">Editar
                            especie:</label>
                        <input type="text" id="especie" name="especie" value="{{ $mascota->especie }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Especie">
                    </div>
                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700">Editar sexo:</label>
                        <select id="sexo" name="sexo"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="macho" {{ $mascota->sexo == 'macho' ? 'selected' : '' }}>Macho</option>
                            <option value="hembra" {{ $mascota->sexo == 'hembra' ? 'selected' : '' }}>Hembra
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="raza" class="block text-sm font-medium text-gray-700">Raza:</label>
                        <input type="text" id="raza" name="raza" value="{{ $mascota->raza }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Raza">
                    </div>
                    <div>
                        <label for="caracteristicas"
                            class="block text-sm font-medium text-gray-700">Características:</label>
                        <textarea id="caracteristicas" name="caracteristicas" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Características">{{ $mascota->caracteristicas }}</textarea>
                    </div>
                </div>

                <!-- Botón Guardar cambios -->
                <div class="mt-6 mb-6">
                    <button type="submit"
                        class="bg-[#E9CF22] hover:bg-[#e9bb2250] text-black font-semibold py-2 px-6 rounded-lg">
                        Guardar cambios
                    </button>
                </div>
            </form>
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

        // Función para agregar nuevas vacunas
        document.getElementById('add-vacuna').addEventListener('click', function() {
            const vacunaList = document.getElementById('vacunas-list');

            // Crear un nuevo div con inputs para la nueva vacuna
            const newVacuna = document.createElement('div');
            newVacuna.classList.add('vacuna-item', 'flex', 'space-x-4');

            // Input para la fecha
            const inputFecha = document.createElement('input');
            inputFecha.type = 'date';
            inputFecha.classList.add('w-1/3', 'p-2', 'border', 'border-gray-300', 'rounded-md');

            // Input para el nombre de la vacuna
            const inputNombre = document.createElement('input');
            inputNombre.type = 'text';
            inputNombre.placeholder = 'Nombre de la vacuna';
            inputNombre.classList.add('w-2/3', 'p-2', 'border', 'border-gray-300', 'rounded-md');

            // Agregar los inputs al nuevo div
            newVacuna.appendChild(inputFecha);
            newVacuna.appendChild(inputNombre);

            // Agregar el nuevo div al contenedor de vacunas
            vacunaList.appendChild(newVacuna);
        });
    </script>
</body>

</html>
