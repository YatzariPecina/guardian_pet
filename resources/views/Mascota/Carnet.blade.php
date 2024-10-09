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


    <main class="w-full max-w-screen-lg mt-8 px-4">

        <div class="flex items-center justify-between mb-4">
            <button class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </button>

            <h1 class="text-3xl font-bold text-center flex-grow">Cheto</h1>
        </div>

        <!-- Contenedor que divide el contenido en dos columnas -->
        <div class="flex justify-between">

            <!-- Columna Izquierda -->
            <div class="w-1/2">
                <!-- Header con la foto y nombre de la mascota -->
                <div class="flex items-center mb-2">
                    <!-- Imagen de la mascota -->
                    <div class="w-64 h-64 rounded-md overflow-hidden">
                        <img src="/img/panzon.png" alt="Mascota" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Detalles de la mascota -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Detalles de la mascota:</h3>
                    <div class="space-y-1">
                        <p><span class="font-semibold">Raza:</span> Mestizo</p>
                        <p><span class="font-semibold">Sexo:</span> Macho</p>
                        <p><span class="font-semibold">Edad:</span> 3 meses</p>
                    </div>
                </div>

                <!-- Botón Editar Mascota -->
                <div class="mt-6">
                    <button type="submit"
                        class="bg-[#E9CF22] hover:bg-[#e9bb2250] text-black font-semibold py-2 px-6 rounded-lg">
                        Editar mascota
                    </button>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="w-full">
                <!-- Próxima cita o vacuna -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Próxima cita o vacuna:</h3>
                    <div class="space-y-4 mt-2">
                        <!-- Primera Cita -->
                        <div class="bg-green-100 p-4 rounded-lg flex justify-between items-center">
                            <div class="flex-grow">
                                <p class="text-black">Cita 1</p>
                                <p class="text-black">Fecha</p>
                                <p class="text-black">Hora</p>
                            </div>
                            <div class="flex space-x-2">
                                <button><img src="img/mirar.png" alt="Ver" class="w-5 h-5"></button>
                                <button><img src="img/editar.png" alt="Editar" class="w-5 h-5"></button>
                                <button><img src="img/eliminar.png" alt="Eliminar" class="w-5 h-5"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vacunas -->
                <div>
                    <h3 class="text-lg font-semibold">Vacunas:</h3>
                    <div class="space-y-4 bg-blue-100 p-4 rounded-md mt-1">
                        <p class="font-semibold"><b>Vacuna 1</b> - 05/09/2024 - Vacuna Hpetavalente + Leptospira</p>
                        <p class="font-semibold"><b>Vacuna 2</b> - 16/09/2024 - Nobivac Parvo C</p>
                        <p class="font-semibold"><b>Vacuna 2</b> - 23/09/2024 - Vacuna Antirrábica Mérieux</p>
                    </div>
                </div>
            </div>

        </div>

    </main>


</body>

</html>
