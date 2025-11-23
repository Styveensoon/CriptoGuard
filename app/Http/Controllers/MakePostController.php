<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class MakePostController extends Controller
{
    public function showForm()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'nullable|string',
            'categoria' => 'nullable|string|max:255',
            'fuente' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
            'fuente' => $request->fuente,
            'url' => $request->url,
            'autor_id' => $user->id,
            'fecha_publicacion' => now(),
        ]);


        return redirect()->route('profile')->with('success', 'Artículo creado correctamente');
    }
}
