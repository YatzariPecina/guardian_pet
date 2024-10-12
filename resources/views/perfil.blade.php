<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Perfil</title>
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
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
            </div>
        </div>
    </header> 

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <div class="flex items-center justify-between mb-4">
            <a href="/inicio" class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </a>            
            <h1 class="text-3xl font-bold text-center flex-grow">Perfil</h1>
        </div>

        <form action="{{ route('perfil.update' , $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $user->nombre }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
        
            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo:</label>
                <input type="email" id="correo" name="correo" value="{{ $user->correo }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
        
            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="{{ $user->telefono }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
        
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva contraseña:</label>
                <input type="password" id="password" name="password" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
        
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
        
            <div class="flex justify-center">
                <button type="submit" class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg hover:bg-[#e9bb2291]">
                    Guardar cambios
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
