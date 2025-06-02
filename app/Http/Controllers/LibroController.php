<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $libros = Libro::when($query, function ($q) use ($query) {
            return $q->where('titulo', 'like', "%{$query}%")
                     ->orWhere('autor', 'like', "%{$query}%");
        })->paginate(5);

        return view('libros.index', compact('libros', 'query'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|digits:4|integer',
            'estado' => 'required|in:Disponible,Prestado',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|digits:4|integer',
            'estado' => 'required|in:Disponible,Prestado',
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
