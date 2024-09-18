@extends('layouts.app')

@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentField = 1;

        document.getElementById('addFieldButton').addEventListener('click', function() {
            const field = document.getElementById('carta_postulacion' + (currentField + 1));
            if (field) {
                field.classList.remove('hidden');
                currentField++;
            }
        });

});

</script>

<h2 class="text-2xl font-bold mb-4 text-14415b">Registrar un postulado</h2>
<p class="text-sm mb-6 text-slate-500 ">(*) Requeridos</p>

<form class="grid grid-cols-2 gap-4" method="post" action="{{ url('/registro_postulado') }}" enctype="multipart/form-data">
    @csrf
    <!-- Datos del aspirante -->
    <div class="col-span-2">
        <h3 class="font-bold text-14415b">Datos del aspirante</h3>
    </div>
    
    <div class="col-span-2">
        <label for="cedula" class="block">Cedula de identidad: <span class="text-red-500">*</span></label>
        <input id="cedula" type="text" class="w-full border border-gray-300 rounded p-2" name="cedula">
    </div>

    <div>
        <label for="nombres" class="block">Nombres: <span class="text-red-500">*</span></label>
        <input id="nombres" type="text" class="w-full p-2 border border-gray-300 rounded" name="nombre">
    </div>
    
    <div>
        <label for="apellidos" class="block">Apellidos: <span class="text-red-500">*</span></label>
        <input id="apellidos" type="text" class="w-full p-2 border border-gray-300 rounded" name="apellido">
    </div>
    
    <div class="col-span-2">
        <label for="correo" class="block">Correo electronico: <span class="text-red-500">*</span></label>
        <input id="correo" type="email" class="w-full p-2 border border-gray-300 rounded" name="mail">
    </div>
    
    <!-- Números de contacto -->
    <div>
        <label for="nombres" class="block">Números de contacto:</label>
    </div>

    <div>
        <input id="contacto1" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Número de teléfono *" name="num1">
        <input id="contacto2" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Número de local *" name="num2">
        <input id="contacto3" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Numero de respaldo " name="num3">
    </div>
    
    <div>
        <label for="tipo_postulacion" class="block">Tipo de postulación: <span class="text-red-500">*</span></label>
        <select name="tipp" id="tipp" class="js-example-basic-single w-full p-2 border border-gray-300 rounded" required>
            <option value="" hidden>Seleccione el tipo de postulación</option>
            <option value="OPSU">OPSU</option>
            <option value="Ente Gubernamental">Ente Gubernamental</option>
            <option value="Consejo comunal">Consejo comunal</option>
            <option value="Deportiva">Deportiva</option>
            <option value="Particular">Particular</option>
        </select>
    </div>
    
    <div>
        <label for="estatus_postulacion" class="block">Estatus de postulación: <span class="text-red-500">*</span></label>
        <select id="" class="js-example-basic-single w-full p-2 border border-gray-300 rounded" name="status">
            <option value="" hidden>Seleccione el estatus del postulado</option>
            <option value="Aceptada">Aceptada</option>
            <option value="En revisión">En revisión</option>
            <option value="Rechazada">Rechazada</option>
        </select>
    </div>
    
    <!-- Datos del postulante -->
    <div class="col-span-2 mt-4">
        <h3 class="font-bold text-14415b">Datos del postulante</h3>
    </div>
    <div class="col-span-2">
        <label for="nombreapellido">Nombre y apellido:</label>
        <input type="text" name="nombreapellido" class="form-control w-full p-2 border border-gray-300 rounded" id="nombreapellido">
        <label id="nombreapellido-label" class="no-aplica-label"></label>    </div>

    <div class="col-span-2">
        <label for="ente">Ente</label>
        <select name="ente" id="ente" class="form-control select2 w-full p-2 border border-gray-300 rounded" required>
            <option value="" hidden>Seleccione el ente</option>
            @foreach ($entes as $ente)
                <option value="{{ $ente->id }}">{{ $ente->ente }}</option>
            @endforeach
        </select>
        <label id="ente-label" class="no-aplica-label"></label>
    </div>
    
    <div>
        <label for="depa">Departamento</label>
        <input type="text" name="depa" class="form-control w-full p-2 border border-gray-300 rounded" id="depa">
        <label id="depa-label" class="no-aplica-label"></label>
    </div>

    <div>
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" class="form-control w-full p-2 border border-gray-300 rounded" id="cargo">
        <label id="cargo-label" class="no-aplica-label"></label>
    </div>

    <!-- Carga de archivos -->
    <div class="col-span-2 mt-4">
        <h3 class="font-bold text-14415b">Carga de archivos</h3>
    </div>

    <div>
        <label for="carta_postulacion" class="block">Carta de postulacion: <span><button type="button" id="addFieldButton" class="bg-blue-500 text-white py-1 px-1 rounded">+</button></span></label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file"  name="CartaP"/>
    </div>

    <div id="carta_postulacion2" class="hidden">
        <label for="carta_postulacion2" class="block">Carta de postulacion 2:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="carta_postulacion2"  name="CartaP2"/>
    </div>    

    <div id="carta_postulacion3" class="hidden">
        <label for="carta_postulacion3" class="block">Carta de postulacion 3:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="carta_postulacion3" name="CartaP3" />
    </div>    

    <div id="carta_postulacion4" class="hidden">
        <label for="carta_postulacion4" class="block">Carta de postulacion 4:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="carta_postulacion4" name="CartaP4" />
    </div>    

    <div id="carta_postulacion5" class="hidden">
        <label for="carta_postulacion5" class="block">Carta de postulacion 5:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="carta_postulacion5" name="CartaP5" />
    </div>
    
    <div>
        <label for="cedula_archivo" class="block">Cedula de identidad:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="cedula_archivo" name="CedulaIdentidad" />
    </div>
    
    <div>
        <label for="titulo" class="block">Titulo:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="titulo" name="TituloB" />
    </div>
    
    <div>
        <label for="certificado_opsu" class="block">Certificado OPSU:</label>
        <input
            class="p-2 relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-white bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
            id="formFileSm"
            type="file" 
            name="certificado_opsu" name="CertOPSU" />
    </div>
    <div class="col-span-2">
        <label for="notas" class="block">Notas de la postulación:</label>
        <textarea id="notas" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese notas sobre la postulación" name="notas"></textarea>
    </div>

    <!-- Botones -->
    <div class="col-span-2 flex justify-between mt-4">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded" id="registrarButton">Registrar</button>
        <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded">Cancelar</button>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipoPostulacionSelect = document.getElementById('tipp');
        const nombreApellidoInput = document.getElementById('nombreapellido');
        const enteSelect = document.getElementById('ente');
        const depaInput = document.getElementById('depa');
        const cargoInput = document.getElementById('cargo');
    
        const nombreApellidoLabel = document.getElementById('nombreapellido-label');
        const enteLabel = document.getElementById('ente-label');
        const depaLabel = document.getElementById('depa-label');
        const cargoLabel = document.getElementById('cargo-label');
    
        // Guardar las opciones originales del select de Ente
        const originalEnteOptions = enteSelect.innerHTML;
    
        function toggleFields() {
            const selectedValue = tipoPostulacionSelect.value;
            const noAplicaText = `No aplica, tipo de postulación ${selectedValue}`;
    
            if (selectedValue === 'OPSU' || selectedValue === 'Particular' || selectedValue === 'Deportiva') {
                nombreApellidoInput.disabled = true;
                enteSelect.disabled = true;
                depaInput.disabled = true;
                cargoInput.disabled = true;
    
                nombreApellidoInput.style.backgroundColor = 'lightgrey';
                enteSelect.style.backgroundColor = 'lightgrey';
                depaInput.style.backgroundColor = 'lightgrey';
                cargoInput.style.backgroundColor = 'lightgrey';
    
                nombreApellidoLabel.textContent = noAplicaText;
                enteLabel.textContent = noAplicaText;
                depaLabel.textContent = noAplicaText;
                cargoLabel.textContent = noAplicaText;
    
                if (selectedValue === 'OPSU') {
                    enteSelect.innerHTML = '<option value="1">OPSU</option>';
                } else if (selectedValue === 'Particular') {
                    enteSelect.innerHTML = '<option value="2">Particular</option>';
                } else if (selectedValue === 'Deportiva') {
                    enteSelect.innerHTML = '<option value="3">Deportes</option>';
                }
            } else {
                nombreApellidoInput.disabled = false;
                enteSelect.disabled = false;
                depaInput.disabled = false;
                cargoInput.disabled = false;
    
                nombreApellidoInput.style.backgroundColor = '';
                enteSelect.style.backgroundColor = '';
                depaInput.style.backgroundColor = '';
                cargoInput.style.backgroundColor = '';
    
                nombreApellidoLabel.textContent = '';
                enteLabel.textContent = '';
                depaLabel.textContent = '';
                cargoLabel.textContent = '';
    
                // Restaurar las opciones originales del select de Ente
                enteSelect.innerHTML = originalEnteOptions;
            }
        }
    
        tipoPostulacionSelect.addEventListener('change', toggleFields);
    
        // Initialize on page load
        toggleFields();
    
        // Remove disabled fields before form submission
        document.getElementById('postuladoForm').addEventListener('submit', function() {
            if (nombreApellidoInput.disabled) {
                nombreApellidoInput.removeAttribute('name');
            }
            if (enteSelect.disabled) {
                enteSelect.removeAttribute('name');
            }
            if (depaInput.disabled) {
                depaInput.removeAttribute('name');
            }
            if (cargoInput.disabled) {
                cargoInput.removeAttribute('name');
            }
        });
    });
    </script>
    
    <style>
    .no-aplica-label {
        color: grey;
        font-size: 0.9em;
        display: block;
        margin-top: 5px;
    }
    </style>
@endsection
