<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Crud Mascota</title>
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

    <!-- Contenido-->
    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <a href="/inicio" class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a>

            <h1 class="text-3xl font-bold text-center flex-grow">Mascotas</h1>
        </div>

        <!-- Barra de búsqueda de mascotas -->
        <form action="{{ route('buscarMascota') }}" method="GET" class="flex justify-center mb-4">
            <div class="flex items-center border border-gray-400 rounded-lg p-2 w-2/3">
                <input type="text" name="busqueda" class="flex-grow outline-none px-2"
                    placeholder="Buscar mascota...">
                <button type="submit">
                    <img src="{{ asset('img/buscar.png') }}" alt="Buscar icon" class="w-6 h-6">
                </button>
            </div>
        </form>

        <!-- Línea pa dividir este pedo-->
        <hr class="my-4 border-gray-300">

        <!-- Nuevo registro -->
        <div class="flex justify-center mb-8">
            <a href="/RegistroMascota"
                class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg text-center hover:bg-[#e9bb2291]">
                Nuevo registro
            </a>
        </div>

        <!-- Tarjetas de mascotas -->
        <div class="grid grid-cols-3 gap-6">
            @if ($mascotas->isEmpty())
                <p>No hay mascotas registradas.</p>
            @else
                @foreach ($mascotas as $mascota)
                    <div class="bg-[#ADDABE] p-4 mb-5 rounded-lg">
                        <img src="{{ asset('storage/' . $mascota->foto) }}" alt="Mascota {{ $mascota->nombre }}"
                            class="w-full h-40 object-cover rounded-lg">
                        <p class="text-black"><span class="font-semibold mt-4">Nombre: </span>{{ $mascota->nombre }}</p>
                        <p class="text-black"><span class="font-semibold mt-4">Raza: </span>{{ $mascota->raza }}</p>
                        <p class="text-black"><span class="font-semibold mt-4">Edad: </span>{{ $mascota->edad }} años
                        </p>

                        <div class="flex justify-between mt-4">
                            <!-- Botón Eliminar -->
                            <button onclick="confirmDelete({{ $mascota->id }})">
                                <img src="img/eliminar.png" alt="Delete" class="w-5 h-5">
                            </button>

                            <!-- Botón Mirar Carnet -->
                            <button onclick="window.location.href='{{ route('mascota.carnet', $mascota->id) }}'">
                                <img src="img/mirar.png" alt="View" class="w-5 h-5">
                            </button>

                            <!-- Botón Editar Carnet -->
                            <button onclick="window.location.href='/EditarDatos/{{ $mascota->id }}'">
                                <img src="img/editar.png" alt="Edit" class="w-5 h-5">
                            </button>

                        </div>

                        <!-- Formulario de eliminación -->
                        <form id="delete-form-{{ $mascota->id }}"
                            action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        function confirmDelete(mascotaId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${mascotaId}`).submit();
                }
            });
        }
    </script>
</body>

</html>
