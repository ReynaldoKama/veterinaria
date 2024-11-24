@extends('layouts.dashboard')

@section('content')

<div class="agenda-container">
    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Sección de citas programadas -->
    <div class="datos-izquierda">
        <h3 class="titulos-izquierda">Citas agendadas</h3>
        <div class="citas-list" id="citas-list">
            <p>ninguna programada</p>
        </div>
    </div>
    
    <!-- Sección para agendar citas y calendario en la misma línea -->
    <div class="agenda-container">
        <!-- Formulario para agendar citas -->
        <div class="agenda-citas">
            <h2>Agenda de citas</h2>
            <form id="form-agendar" class="formulario-agenda">
                <label>Horario Inicio:</label>
                <input type="time" id="horario_inicio" name="horario_inicio" class="input-text" placeholder="Horario de Inicio">
                
                <label>Horario Fin:</label>
                <input type="time" id="horario_fin" name="horario_fin" class="input-text" placeholder="Horario de Fin">
                
                <label>Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="input-text" placeholder="Fecha">
                
                <label>Motivo:</label>
                <textarea id="motivo" name="motivo" class="input-textarea" placeholder="Motivo"></textarea>
                
                <button type="button" class="btn-si btn-ver-producto" onclick="agendarCita()">Agendar Cita</button>
            </form>
        </div>

        <!-- Calendario a la derecha del formulario -->
        <div class="calendario">
            <div class="calendario-header">
                <h2>AGENDA</h2>
            </div>
            <div class="calendario-grid">
                <!-- Días del calendario -->
                @for($i = 1; $i <= 30; $i++)
                    <div class="calendario-dia" onclick="seleccionarFecha({{ $i }})">{{ $i }}</div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script>
    // Función para seleccionar la fecha en el calendario y actualizar el campo de fecha
    function seleccionarFecha(dia) {
        const mesActual = new Date().getMonth() + 1;
        const anioActual = new Date().getFullYear();
        const fecha = `${anioActual}-${mesActual < 10 ? '0' : ''}${mesActual}-${dia < 10 ? '0' : ''}${dia}`;
        document.getElementById('fecha').value = fecha;
    }

    // Función para agendar la cita
    function agendarCita() {
        const horarioInicio = document.getElementById('horario_inicio').value;
        const horarioFin = document.getElementById('horario_fin').value;
        const fecha = document.getElementById('fecha').value;
        const motivo = document.getElementById('motivo').value;

        if (horarioInicio && horarioFin && fecha && motivo) {
            const cita = `<div class="cita-box">
                <p><strong>Fecha:</strong> ${fecha}</p>
                <p><strong>Horario:</strong> ${horarioInicio} - ${horarioFin}</p>
                <p><strong>Motivo:</strong> ${motivo}</p>
            </div>`;

            const citasList = document.getElementById('citas-list');
            if (citasList.innerHTML.trim() === 'ninguna programada') {
                citasList.innerHTML = '';
            }
            citasList.innerHTML += cita;

            document.getElementById('form-agendar').reset();
        } else {
            alert('Por favor, completa todos los campos antes de agendar la cita.');
        }
    }
</script>
@endsection
