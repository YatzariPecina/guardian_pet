<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Inicio - Guardian Pet</title>
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
    
    <section class="w-full max-w-screen-lg mt-6">
        <img src="img/perritobebebonito.webp" alt="Dog in a field" class="w-full h-80 object-cover">
    </section>

    <section class="w-full max-w-screen-lg flex justify-center mt-4">
        <button class="bg-[#E9CF22] text-black font-semibold py-2 px-8 rounded-lg">
            Nueva mascota
        </button>
    </section>

    <section class="w-full max-w-screen-lg mt-8">
        <h2 class="text-black font-semibold mb-4">Próximas vacunas:</h2>
        <div class="space-y-4">
            <div class="bg-[#ADDABE] p-4 rounded-lg flex justify-between items-center">
                <p class="text-black">Vacuna 1</p>
                <p class="text-black">Fecha</p>
            </div>
            <div class="bg-[#ADDABE] p-4 rounded-lg flex justify-between items-center">
                <p class="text-black">Vacuna 2</p>
                <p class="text-black">Fecha</p>
            </div>
        </div>
    </section>

    <section class="w-full max-w-screen-lg flex justify-center mt-8">
        <div class="flex space-x-2">
            <div class="w-3 h-3 bg-black rounded-full"></div>
            <div class="w-3 h-3 bg-black rounded-full"></div>
            <div class="w-3 h-3 bg-black rounded-full"></div>
        </div>
    </section>
</body>

</html>
