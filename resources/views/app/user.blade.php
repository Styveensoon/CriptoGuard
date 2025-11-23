<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de Usuario - CriptoGuard</title>
    <link rel="stylesheet" href="{{ asset('css/cite/style_user.css') }}">
    <link rel="icon" href="{{ asset('resources/bicho.png') }}">
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <a href="{{ route('dashboard') }}" class="brand" style="text-decoration: none;">
    <div class="shield"></div>
    <span>CriptoGuard</span>
</a>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                Cerrar Sesión
            </button>
        </form>
    </nav>

    <!-- ALERTA DE ÉXITO -->
    @if (session('success'))
    <div id="alerta-exito" 
         style="
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            padding: 15px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 900px;
            text-align: center;
            font-weight: 700;
            color: #000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            animation: slideDown 0.4s ease forwards;
         ">
        ✔ {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alerta = document.getElementById("alerta-exito");
            if(alerta){
                alerta.style.transition = "opacity 0.5s ease";
                alerta.style.opacity = "0";

                setTimeout(() => alerta.remove(), 600);
            }
        }, 3000);
    </script>

    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-15px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endif


    <!-- CONTENIDO PRINCIPAL -->
    <div class="container">
        <!-- PERFIL DE USUARIO -->
        <section class="profile-section">
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="profile-info">
                        <h2>{{ auth()->user()->name }} {{ auth()->user()->paterno ?? '' }}</h2>
                        <p>{{ auth()->user()->role ?? 'Usuario' }}</p>
                    </div>
                </div>
                
                <div class="profile-details">
                    <div class="detail-item">
                        <div class="detail-label">Usuario</div>
                        <div class="detail-value">{{ auth()->user()->username }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ auth()->user()->email }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Especialidad</div>
                        <div class="detail-value">{{ auth()->user()->specialty ?? 'No especificada' }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Experiencia</div>
                        <div class="detail-value">{{ auth()->user()->experience ?? 'No especificada' }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Empresa</div>
                        <div class="detail-value">{{ auth()->user()->company ?? 'No especificada' }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Fecha de Nacimiento</div>
                        <div class="detail-value">{{ auth()->user()->birthdate ?? 'No especificada' }}</div>
                    </div>
                </div>
            </div>
            
            <!-- FORMULARIO DE CREACIÓN -->
            <div class="form-card">
                <h2 class="section-title">Crear Artículo</h2>
                
                <form action="{{ route('articulos.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Contenido</label>
                        <textarea name="contenido" class="form-textarea"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Categoría</label>
                        <input type="text" name="categoria" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Fuente</label>
                        <input type="text" name="fuente" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">URL</label>
                        <input type="text" name="url" class="form-input">
                    </div>
                    
                    <button type="submit" class="btn-primary">Crear Artículo</button>
                </form>
            </div>
        </section>
        
        <!-- HISTORIAL DE ARTÍCULOS -->
<section class="history-section">
    <h2 class="section-title">Mis Artículos Publicados</h2>

    <div class="history-grid">
        @php
            use App\Models\Articulo;
            use Illuminate\Support\Str;
            use Carbon\Carbon;

            // Si la ruta ya pasó $posts, úsalo; si no, carga los artículos del usuario directamente.
            if (isset($posts) && $posts !== null) {
                // Asegurarnos de trabajar con una colección
                $collection = is_object($posts) ? $posts : collect($posts);
                // Filtrar por autor (por si $posts contiene todos los artículos)
                $userPosts = $collection->where('autor_id', auth()->id())->values();
            } else {
                // Fallback: traer desde el modelo los artículos del usuario
                $userPosts = Articulo::where('autor_id', auth()->id())
                    ->orderBy('fecha_publicacion', 'desc')
                    ->get();
            }
        @endphp

        @if($userPosts->isNotEmpty())
            @foreach($userPosts as $post)
                <div class="history-card">
                    <h3>{{ $post->titulo }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($post->contenido ?? '', 150) }}</p>
                    <div class="history-meta">
                        <span>{{ $post->categoria ?? '-' }}</span>
                        <span>
                            @if(!empty($post->fecha_publicacion))
                                {{-- Manejar date o datetime --}}
                                {{ \Carbon\Carbon::parse($post->fecha_publicacion)->format('d/m/Y') }}
                            @else
                                Sin fecha
                            @endif
                        </span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-history">
                <p>Aún no has publicado ningún artículo.</p>
            </div>
        @endif
    </div>
</section>
    </div>
</body>
</html>
