<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitasController extends Controller
{
     // Mostrar la vista de citas
    public function index()
    {
        return view('citas.index');
    }
     // Guardar la cita (solo datos estáticos por ahora)
    public function store(Request $request)
    {
     // Aquí puedes procesar y almacenar la cita (por ahora, solo simula el guardado)
        $request->validate([
            'horario' => 'required',
            'fecha' => 'required',
            'motivo' => 'required',
        ]);

         // Retorna un mensaje de éxito o realiza alguna acción
        return redirect()->route('citas.index')->with('success', 'Cita agendada con éxito.');
    }
}
