<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Carnet</title>
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

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        
        <!-- Header con la foto y nombre de la mascota -->
        <div class="flex items-center space-x-4 mb-6">
            <!-- Imagen de la mascota -->
            <div class="w-32 h-32 rounded-md overflow-hidden">
                <img src="/img/panzon.png" alt="Mascota" class="w-full h-full object-cover">
            </div>
            <!-- Nombre de la mascota -->
        </div>
        <!-- Detalles de la mascota -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold">Detalles de la mascota:</h3>
            <div class="space-y-2">
                <p><span class="font-semibold">Raza:</span> Mestizo</p>
                <p><span class="font-semibold">Sexo:</span> Macho</p>
                <p><span class="font-semibold">Edad:</span> 3 años</p>
            </div>
        </div>
        
        <!-- Botón Editar Mascota -->
        <div class="mt-6">
            <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar mascota</button>
        </div>

        <!-- Próxima cita o vacuna -->
        
        <h2 class="text-2xl font-bold">Cheto</h2>
        <div class="mb-6">
            <h3 class="text-lg font-semibold">Próxima cita o vacuna:</h3>
            <div class="space-y-4">
                <!-- Primera Cita -->
                <div class="flex items-center space-x-2 bg-blue-100 p-4 rounded-md">
                    <div class="flex-grow">
                        <p class="text-sm">Descripción de la cita/vacuna</p>
                        <p class="text-xs text-gray-500">Fecha</p>
                    </div>
                    <!-- Iconos de acciones -->
                    <button class="text-blue-500 hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3 3m-3-3l3-3" />
                        </svg>
                    </button>
                    <button class="text-green-500 hover:text-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                    <button class="text-red-500 hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
                <!-- Segunda Cita (puedes agregar más citas de la misma forma) -->
            </div>
        </div>
    
        <!-- Vacunas -->
        <div>
            <h3 class="text-lg font-semibold">Vacunas:</h3>
            <div class="space-y-4 bg-green-100 p-4 rounded-md">
                <p>Vacuna 1 - Fecha</p>
                <p>Vacuna 2 - Fecha</p>
            </div>
        </div>
    
    </div>
    
</body>

</html>
