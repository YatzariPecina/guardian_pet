<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Cita</title>
    <!-- Enlace a Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery (necesario para Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="h-screen bg-white flex flex-col items-center">
    <header class="bg-[#24CE6B] w-full flex justify-between items-center px-12 py-4 relative">
        <div class="flex items-center space-x-6">
            <a href="/inicio"> 
                <img src="img/logo_guardian_pet.png" alt="Guardian Pet Logo" class="w-8 h-8 object-contain">
            </a>
            <a href="/inicio" class="text-xs font-bold text-black">Guardian Pet</a> 
        </div>
        <nav class="flex space-x-12">
            <a href="/CrudMascota" class="text-black font-semibold hover:underline">Mascotas</a> 
            <a href="/CrudCitas" class="text-black font-semibold hover:underline">Recordatorios</a> 
            <a href="{{ route('veterinario.index') }}" class="text-black font-semibold hover:underline">Mis veterinarios</a> 
        </nav>
        <div class="relative">
            <img src="../img/user.png" alt="User Icon" class="w-6 h-6 cursor-pointer" id="userIcon">
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
            </div>
        </div>
    </header>    

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="/CrudCitas" class="text-2xl">
                <img src="../img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a> 
            <h1 class="text-3xl font-bold text-center flex-grow">Editar cita</h1>
        </div>

        <form class="space-y-6" method="POST" action="{{ route('citas.actualizar', $citas->id) }}">
            @csrf 
            <!-- Campo de seleccionar mascota con select2 -->
            <div>
                <label for="mascota" class="block text-sm font-medium text-gray-700">Nombre de la mascota:</label>
                <select id="mascota" name="mascota" class="mt-1 block w-full select2">
                    <option value="">Selecciona una mascota</option>
                    @foreach ($mascotas as $mascota)
                        <option value="{{ $mascota->id }}" {{ $mascota->id == $citas->mascota_id ? 'selected' : '' }}>
                            {{ $mascota->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo de seleccionar veterinario con select2 -->
            <div>
                <label for="veterinario" class="block text-sm font-medium text-gray-700">Nombre del veterinario:</label>
                <select id="veterinario" name="veterinario" class="mt-1 block w-full select2">
                    <option value="">Selecciona un veterinario</option>
                    @foreach ($veterinarios as $veterinario)
                        <option value="{{ $veterinario->id }}" {{ $veterinario->id == $citas->veterinario_id ? 'selected' : '' }}>
                            {{ $veterinario->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo de la fecha -->
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de la cita:</label>
                <input type="date" id="fecha" name="fecha" value="{{ $citas->fecha }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Campo de la hora -->
            <div>
                <label for="hora" class="block text-sm font-medium text-gray-700">Hora de la cita:</label>
                <input type="time" id="hora" name="hora" value="{{ $citas->hora }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Campo de motivo -->
            <div>
                <label for="motivo" class="block text-sm font-medium text-gray-700">Motivo de la cita:</label>
                <textarea id="motivo" name="motivo" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md">
                    {{ $citas->motivo }}
                </textarea>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg">
                    Actualizar cita
                </button>
            </div>
        </form>
    </main>

    <!-- Enlace a Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const userIcon = document.getElementById('userIcon');
        const dropdownMenu = document.getElementById('dropdownMenu');

        $(document).ready(function() {
            $('#mascota').select2();
            $('#veterinario').select2();
        });

        userIcon.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!userIcon.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        $(document).ready(function() {
            // Inicializa select2 en los selectores
            $('#mascota').select2();
            $('#veterinario').select2();
        });
    </script>
</body>

</html>
