<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Perfil</title>
</head>

<body class="h-screen bg-white flex flex-col items-center">
    <header class="bg-[#24CE6B] w-full flex justify-between items-center px-12 py-4">
        <div class="flex items-center space-x-6">
            <img src="img/logo_guardian_pet.png" alt="Guardian Pet Logo" class="w-8 h-8 object-contain">
            <h1 class="text-xs font-bold text-black">Guardian Pet</h1>
        </div>
        <nav class="flex space-x-12">
            <a href="#" class="text-black font-semibold hover:underline">Mascotas</a>
            <a href="#" class="text-black font-semibold hover:underline">Recordatorios</a>
            <a href="#" class="text-black font-semibold hover:underline">Veterinarios</a>
        </nav>
        <div>
            <img src="img/user.png" alt="User Icon" class="w-6 h-6">
        </div>
    </header>

    <main class="w-full max-w-screen-lg mt-8 px-4">
        <div class="flex items-center justify-between mb-4">
            <button class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </button>
            <h1 class="text-3xl font-bold text-center flex-grow">Perfil</h1>
        </div>

        <form class="space-y-6">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="nueva_password" class="block text-sm font-medium text-gray-700">Nueva contraseña:</label>
                <input type="password" id="nueva_password" name="nueva_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="confirmar_password" class="block text-sm font-medium text-gray-700">Confirmar contraseña:</label>
                <input type="password" id="confirmar_password" name="confirmar_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg">
                    Guardar cambios
                </button>
            </div>
        </form>
    </main>
</body>

</html>
