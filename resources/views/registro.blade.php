<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro</title>
</head>

<body class="h-screen bg-[#24CE6B] flex items-center justify-center">
    <div class="bg-[#91ecac] p-8 rounded-lg shadow-xl w-full max-w-sm">
        <div class="flex flex-col items-center mb-6">
            <img src="img/logo_guardian_pet.png" alt="Login Icon" class="w-20 h-20 mb-4">
            <h2 class="text-3xl font-bold mb-6 text-black">Guardian Pet</h2>
        </div>

        <form class="w-full" action="#" method="POST">
            @csrf
            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="text" name="name" id="name"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Nombre completo" required>
            </div>

            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="email" name="correo" id="correo"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Correo" required>
            </div>

            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="password" name="password" id="password"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Contraseña" required>
            </div>

            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Confirmar contraseña" required>
            </div>

            <div class="flex-grow flex items-center justify-center mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-[#011752] hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#011752]">
                    Registrarme
                </button>
            </div>

            <div class="flex-grow flex items-center justify-center mt-3">
                <button type="button"
                    class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-[#011752] hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#011752]">
                    Regresar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
