<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function index()
    {
        $posts = Articulo::with('autor')
            ->orderBy('fecha_publicacion', 'desc')
            ->get();

        return view('app.init', compact('posts'));
    }
}
