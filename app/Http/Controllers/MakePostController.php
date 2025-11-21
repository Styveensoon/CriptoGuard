<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class MakePostController extends Controller
{
    public function showForm()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Validación rápida
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'nullable|string',
            'categoria' => 'nullable|string|max:255',
            'fuente' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        // Crear artículo sin firma aún
        $articulo = Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
            'fuente' => $request->fuente,
            'url' => $request->url,
            'autor_id' => $user->id,
            'fecha_publicacion' => now(),
        ]);

        // Crear firma JWT
        $payload = [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_name' => $user->name,
            'articulo_id' => $articulo->id,
            'created_at' => now()->toDateTimeString(),
        ];

        $jwt = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        // Guardar firma
        $articulo->firma = $jwt;
        $articulo->save();

        return redirect()->route('dashboard')->with('success', 'Artículo creado correctamente');
    }
}
