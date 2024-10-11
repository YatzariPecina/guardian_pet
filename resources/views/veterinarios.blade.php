<h1>Veterinarios Cercanos</h1>


    <input type="text" name="ubicacion" placeholder="Ingrese su ubicación (latitud,longitud)">
    <button type="submit">Buscar</button>


@if (isset($error))
    <p>{{ $error }}</p>
@else
    <maps-google :location="$ubicacion"></maps-google>
@endif
