<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="h-screen bg-[#24CE6B] flex items-center justify-center">
    <div class="bg-[#91ecac] p-8 rounded-lg shadow-xl w-full max-w-sm">
        <div class="flex flex-col items-center mb-6">
            <img src="img/logo_guardian_pet.png" alt="Login Icon" class="w-20 h-20 mb-4">
            <h2 class="text-3xl font-bold mb-6 text-black">Guardian Pet</h2>
        </div>

        <form class="w-full" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="email" name="correo" id="correo"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Correo" required>
            </div>
            @error('correo')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            
            <div class="mb-4 flex items-center bg-white rounded-md shadow-sm">
                <input type="password" name="password" id="password"
                    class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-black placeholder-gray-500"
                    placeholder="Contraseña" required>
            </div>
            @error('password')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            
            <div class="flex-grow flex items-center justify-center mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-[#011752] hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#011752]">
                    Iniciar sesión
                </button>
            </div>
        </form>
    
        @if(session('error'))
            <div class="text-red-600 text-sm mt-4">
                {{ session('error') }}
            </div>
        @endif
          
        <div class="mt-6 text-center text-black text-xs">
            <span>¿Aún no tienes cuenta?</span>
            <a href="/registro" class="font-bold underline">Regístrate</a> 
        </div>        
    </div>
</body>

</html>
