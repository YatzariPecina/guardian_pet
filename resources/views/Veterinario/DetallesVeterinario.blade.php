<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Detalles Veterinario</title>
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
            <a href="/MisVeterinarios" class="text-black font-semibold hover:underline">Mis veterinarios</a>
        </nav>
        <div class="relative">
            <img src="img/user.png" alt="User Icon" class="w-6 h-6 cursor-pointer" id="userIcon">
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar información del
                    perfil</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar
                    sesión</a>
            </div>
        </div>
    </header>

    <main class="w-full max-w-screen-lg">

        <!-- Contenedor para ser dividido -->
        <div class="flex justify-between">

            <!-- Columna Izquierda -->
            <div class="w-1/2 bg-green-100 flex flex-col items-center"> <!-- Añadido 'flex flex-col items-center' -->
                <!-- Header con la foto y calificaciones de la veterinaria -->
                <div class="flex items-center mt-8 m-2">
                    <!-- Imagen de la veterinario con margen -->
                    <div class="w-full h-full rounded-md overflow-hidden mx-2"> 
                        <img src="/img/VET1.png" alt="Mascota" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Calificaciones y opiniones-->
                <h4 class="font-semibold mt-5 mb-3">Opiniones: </h4>

                <div class="grid grid-cols-1 gap-6 mx-2">
                    <div class="flex items-start space-x-4">
                        <!-- Imagen circular -->
                        <img src="img/perfil1.jpg" alt="Opinion 1" class="w-16 h-16 object-cover rounded-full">

                        <div class="flex flex-col justify-center">
                            <!-- Estrellas utilizando Font Awesome Icons -->
                            <div class="flex space-x-1 text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p class="text-justify">Excelente servicio, buen trato a las mascotas y precios económicos,
                                super recomendada la veterinaria.</p>
                        </div>

                    </div>
                    <hr class="my-1 border-gray-300">
                </div>

                <div class="grid grid-cols-1 gap-6 mx-2">
                    <div class="flex items-start space-x-4">
                        <!-- Imagen circular -->
                        <img src="img/perfil2.jpg" alt="Opinion 2" class="w-16 h-16 object-cover rounded-full">

                        <div class="flex flex-col justify-center">
                            <!-- Estrellas utilizando Font Awesome Icons -->
                            <div class="flex space-x-1 text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-justify">La mejor atención, el veterinario es muy humano y
                                su práctica profesional es muy atinada. ¡Más que recomendable</p>
                        </div>
                    </div>
                    <hr class="my-1 border-gray-300">
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="w-1/2 mt-8 mx-4">
                <div class="flex items-center justify-between mb-4">
                    <a href="/inicio" class="text-2xl">
                        <img src="img/regresar.png" alt="Back arrow" class="w-6 h-6">
                    </a>

                    <h1 class="text-2xl font-bold text-center flex-grow">Centro Veterinario 3 de Abril</h1>
                </div>

                <!-- Línea pa dividir este pedo <- gracias a luisarna salas -->
                <hr class="my-4 border-gray-300">

                <!-- Servicios que ofrece -->
                <div class="mb-6">
                    <div>
                        <p class="text-justify">El Centro Veterinario 3 de Abril es un centro veterinario ubicado en la
                            ciudad de Victoria, Tamaulipas. Ofrece una amplia variedad de servicios para mascotas,
                            incluyendo vacunación, desparasitación, consulta general, cirugía y hospitalización. El
                            centro también cuenta con un laboratorio de diagnóstico y un área de radiología.</p>

                        <h4 class="font-semibold mt-5">Servicios: </h4>
                        <ul class="list-disc list-outside ml-20">
                            <li>Vacunación</li>
                            <li>Desparasitación</li>
                            <li>Consulta general</li>
                            <li>Cirugía</li>
                            <li>Hospitalización</li>
                            <li>Laboratorio de diagnóstico</li>
                            <li>Radiología</li>
                        </ul>

                        <h4 class="font-semibold mt-2">Ubicación: </h4>
                        <p>Ing. Américo Villarreal Guerra 38, Solidaridad Voluntad y Trabajo II, 87089 Cdad. Victoria,
                            Tamps.</p>

                        <h4 class="font-semibold mt-2">Horario: </h4>
                        <p>Lunes a viernes: 8:00 a 20:00 horas<br>
                            Sábados: 8:00 a 15:00 horas</p>
                    </div>
                </div>

                <!-- Línea pa dividir este pedo <- Gracias Luisana -->
                <hr class="my-4 border-gray-300">

                <!-- Datos de contacto -->
                <div>
                    <h3 class="text-lg font-semibold">Contacto:</h3>
                    <div class="space-y-1">
                        <p class="font-semibold"><b>Veterinario:</b> M.V.Z. Jesus Antonio Olazarna Mora</p>
                        <p class="font-semibold"><b>Especialidad:</b> Bienestar animal</p>
                        <p class="font-semibold"><b>Telefono:</b> +52 (834) 123 4567</p>
                        <p class="font-semibold"><b>Correo electronico:</b> vet3dabril@gmail.com</p>
                    </div>
                </div>

                <!-- Botón agregar a Mis Veterinarios -->
                <div class="mt-5 mb-5 item flex justify-center">
                    <button id="addVetButton" type="button"
                        class="bg-[#24CE6B] hover:bg-green-500 text-black font-semibold py-2 px-6 rounded-lg"
                        onclick="changeButtonText()">
                        Agregar veterinario
                    </button>
                </div>
            </div>

        </div>

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

        function changeButtonText() {
            var button = document.getElementById('addVetButton');
            button.textContent = "Agregado";
            button.disabled = true; // Opcional: Deshabilita el botón después de agregar
            button.classList.remove('hover:bg-[#e9bb2250]'); // Opcional: Elimina el hover
        }
    </script>
</body>

</html>
