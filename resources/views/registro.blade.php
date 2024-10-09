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
            <img src="img/logo_guardian_pet.png" alt="Logo Guardian Pet" class="w-20 h-20 mb-4">
            <h2 class="text-3xl font-bold mb-6 text-black">Guardian Pet</h2>
        </div>

        <form action="{{ route('validar-registro') }}" method="POST">
            @csrf
            <div class="mb-4 bg-white rounded-md shadow-sm">
                <input type="text" name="nombre" id="nombre"
                    class="w-full px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Nombre completo" required>
            </div>

            <div class="mb-4 bg-white rounded-md shadow-sm">
                <input type="email" name="correo" id="correo"
                    class="w-full px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Correo" required>
            </div>

            <div class="mb-4 bg-white rounded-md shadow-sm">
                <input type="text" name="telefono" id="telefono"
                    class="w-full px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Teléfono" required>
            </div>

            <div class="mb-4 bg-white rounded-md shadow-sm">
                <input type="password" name="password" id="password"
                    class="w-full px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Contraseña" required>
            </div>

            <div class="mb-4 bg-white rounded-md shadow-sm">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Confirmar contraseña" required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Botón para registrarse -->
            <div class="flex-grow flex items-center justify-center mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-[#011752] hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#011752]">
                    Registrarme
                </button>
            </div>

            <!-- Botón de regresar -->
            <div class="flex-grow flex items-center justify-center mt-3">
                <a href="/"
                    class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-[#011752] hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#011752]">
                    Regresar
                </a>
            </div>
        </form>
    </div>
</body>

</html>
