<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        return Curso::all();
    }

    public function show($id)
    {
        return Curso::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Curso::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $docente = Curso::findOrFail($id);
        $docente->update($request->all());
        return $docente;
    }

    public function destroy($id)
    {
        $docente = Curso::findOrFail($id);
        $docente->delete();
        return response()->json(null, 204);
    }

    public function matricularAlumno(Request $request, $cursoId)
    {
        $curso = Curso::findOrFail($cursoId);
        $curso->alumnos()->attach($request->alumno_id);
        return response()->json(['message' => 'Alumno matriculado en el curso']);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
