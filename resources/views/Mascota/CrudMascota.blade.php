<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Crud Mascota</title>
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

    <!-- Contenido-->
    <main class="w-full max-w-screen-lg mt-8 px-4">
        <!-- Pal regresar y el titulo -->
        <div class="flex items-center justify-between mb-4">
            <button class="text-2xl">
                <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
            </button>
            
            <h1 class="text-3xl font-bold text-center flex-grow">Mascotas</h1>
        </div>

        <!-- Barra de búsqueda de perros malcriados-->
        <div class="flex justify-center mb-4">
            <div class="flex items-center border border-gray-400 rounded-lg p-2 w-2/3">
                <input type="text" class="flex-grow outline-none px-2" placeholder="Buscar mascota...">
                <button>
                    <img src="img/buscar.png" alt="Buscar icon" class="w-6 h-6">
                </button>
            </div>
        </div>

        <!-- Línea pa dividir este pedo-->
        <hr class="my-4 border-gray-300">

        <!-- Nuevo registro-->
        <div class="flex justify-center mb-8">
            <button class="bg-[#E9CF22] text-black font-semibold py-2 px-6 rounded-lg">
                Nuevo registro
            </button>
        </div>

        <!-- Tarjetas de mascotas -->
        <div class="grid grid-cols-3 gap-6">
            <!-- Tarjeta 1 -->
            <div class="bg-[#ADDABE] p-4 rounded-lg">
                <img src="img/Mascota1.jpg" alt="Dog 1" class="w-full h-40 object-cover rounded-lg">
                <h3 class="text-black mt-4">Nombre</h3>
                <p class="text-black">Raza</p>
                <p class="text-black">Edad</p>
                <div class="flex justify-between mt-4">
                    <button><img src="img/mirar.png" alt="View" class="w-5 h-5"></button>
                    <button><img src="img/editar.png" alt="Edit" class="w-5 h-5"></button>
                    <button><img src="img/eliminar.png" alt="Delete" class="w-5 h-5"></button>
                </div>
            </div>
            <!-- Tarjeta 2 -->
            <div class="bg-[#ADDABE] p-4 rounded-lg">
                <img src="img/Mascota2.jpg" alt="Dog 2" class="w-full h-40 object-cover rounded-lg">
                <h3 class="text-black mt-4">Nombre</h3>
                <p class="text-black">Raza</p>
                <p class="text-black">Edad</p>
                <div class="flex justify-between mt-4">
                    <button><img src="img/mirar.png" alt="View" class="w-5 h-5"></button>
                    <button><img src="img/editar.png" alt="Edit" class="w-5 h-5"></button>
                    <button><img src="img/eliminar.png" alt="Delete" class="w-5 h-5"></button>
                </div>
            </div>
            <!-- Tarjeta 3 -->
            <div class="bg-[#ADDABE] p-4 rounded-lg">
                <img src="img/Mascota3.jpg" alt="Dog 3" class="w-full h-40 object-cover rounded-lg">
                <h3 class="text-black mt-4">Nombre</h3>
                <p class="text-black">Raza</p>
                <p class="text-black">Edad</p>
                <div class="flex justify-between mt-4">
                    <button><img src="img/mirar.png" alt="View" class="w-5 h-5"></button>
                    <button><img src="img/editar.png" alt="Edit" class="w-5 h-5"></button>
                    <button><img src="img/eliminar.png" alt="Delete" class="w-5 h-5"></button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
