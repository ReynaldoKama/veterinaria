@extends('layouts.dashboard')

@section('content')

<div class="agenda-container">

    <!-- Sección de citas programadas -->
    <div class="datos-izquierda">
        <h3 class="titulos-izquierda">Citas agendadas</h3>
        <div class="citas-list" id="citas-list">
            @if($citas->isEmpty())
                <p>Ninguna programada</p>
            @else
                @foreach($citas as $cita)
                    <div class="cita-box">
                        <p><strong>Fecha:</strong> {{ $cita->appointment_date }}</p>
                        <p><strong>Horario:</strong> {{ $cita->horario }}</p>
                        <p><strong>Motivo:</strong> {{ $cita->motive }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    <!-- Sección para agendar citas -->
    <div class="agenda-citas">
        <h2>Agenda de citas</h2>
        <form action="{{ route('citas.store') }}" method="POST" id="form-agendar" class="formulario-agenda">
            @csrf
            <label>Horario:</label>
            <select id="horario" name="horario" class="input-text" required>
                <option value="" disabled selected>Seleccione un horario</option>
                @foreach($horariosDisponibles as $horario)
                    <option value="{{ $horario }}">{{ $horario }}</option>
                @endforeach
            </select>
            
            <label>Fecha:</label>
            <input type="date" id="fecha" name="fecha" class="input-text" value="{{ old('fecha') }}" required>
            
            <label>Motivo:</label>
            <textarea id="motivo" name="motivo" class="input-textarea" placeholder="Motivo" required>{{ old('motivo') }}</textarea>
            
            <button type="submit" class="btn-si btn-ver-producto">Agendar Cita</button>
            <!-- Mensaje de éxito -->
            @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- Mensaje de error -->
            @if($errors->any())
                <div class="alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </form>
    </div>
</div>

@endsection
