<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;

class DocenteController extends Controller
{
    public function index()
    {
        return Docente::all();
    }

    public function show($id)
    {
        return Docente::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Docente::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return $docente;
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return response()->json(null, 204);
    }
}
