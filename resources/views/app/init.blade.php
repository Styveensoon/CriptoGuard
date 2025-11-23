<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cripto Guard - Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/cite/style_init.css') }}">
    <link rel="icon" href="{{ asset('resources/bicho.png') }}">
</head>
<body>

    <nav>
        <div class="brand">
            <div class="shield"></div>
            <span>Cripto Guard</span>
        </div>

        <!-- Inicial del usuario -->
        <a href="{{ route('profile') }}" class="profile">
            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
        </a>
    </nav>

    <div class="search-container">
        <div class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" id="search" placeholder="Buscar alertas, artículos, categorías..." />
        </div>
    </div>

    <div class="cards" id="cardsContainer">
        @foreach ($posts as $post)
            <div class="card" data-filter="{{ strtolower($post->titulo . ' ' . $post->contenido . ' ' . $post->categoria . ' ' . $post->fuente) }}">
                <h3>{{ $post->titulo }}</h3>
                <p class="card-content">{{ $post->contenido }}</p>
                <div class="card-meta">
                    <div class="meta-item"><strong>Fuente:</strong> {{ $post->fuente }}</div>
                    <div class="meta-item"><strong>Categoría:</strong> {{ $post->categoria }}</div>
                    <div class="meta-item"><strong>Fecha:</strong> {{ $post->fecha_publicacion }}</div>
                </div>
                <a href="{{ $post->url }}" target="_blank">Leer más</a>
            </div>
        @endforeach
    </div>

    <script>
        const searchInput = document.getElementById("search");
        const cards = document.querySelectorAll('.card');

        searchInput.addEventListener("input", () => {
            const q = searchInput.value.toLowerCase();

            cards.forEach(card => {
                // Cambiamos aquí: ahora buscamos en el título (h3) en lugar de en data-filter
                const titulo = card.querySelector('h3').textContent.toLowerCase();
                card.style.display = titulo.includes(q) ? 'block' : 'none';
            });
        });
    </script>

</body>
</html>