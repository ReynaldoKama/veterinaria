<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Obtener citas del usuario autenticado
        $citas = Appointment::where('user_id', $userId)->get();

        // Generar horarios disponibles
        $horarios = $this->generarHorarios();
        $horariosReservados = Appointment::where('appointment_date', today())
            ->pluck('horario')
            ->toArray();

        $horariosDisponibles = array_diff($horarios, $horariosReservados);

        return view('citas.index', compact('citas', 'horariosDisponibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'horario' => 'required|date_format:H:i',
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
        ]);

        // Verificar si el horario ya está reservado
        $horarioReservado = Appointment::where('appointment_date', $request->fecha)
            ->where('horario', $request->horario)
            ->exists();

        if ($horarioReservado) {
            return back()->withErrors(['El horario ya está reservado.']);
        }

        Appointment::create([
            'appointment_date' => $request->fecha,
            'horario' => $request->horario,
            'motive' => $request->motivo,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita agendada con éxito.');
    }

    private function generarHorarios()
    {
        $horarios = [];
        $horaInicio = strtotime('10:00');
        $horaFin = strtotime('18:00');

        while ($horaInicio < $horaFin) {
            $horarios[] = date('H:i', $horaInicio);
            $horaInicio = strtotime('+30 minutes', $horaInicio);
        }

        return $horarios;
    }
}
