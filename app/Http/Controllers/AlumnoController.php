<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{

    public function index()
    {
        return Alumno::all();
    }

    public function show($id)
    {
        return Alumno::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Alumno::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $docente = Alumno::findOrFail($id);
        $docente->update($request->all());
        return $docente;
    }

    public function destroy($id)
    {
        $docente = Alumno::findOrFail($id);
        $docente->delete();
        return response()->json(null, 204);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
