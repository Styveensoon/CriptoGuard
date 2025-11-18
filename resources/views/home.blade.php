<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cripto Guard - Foro de Amenazas de Seguridad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">
    <link rel="icon" href="{{ asset('resources/bicho.png') }}">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-shield-alt logo-icon"></i>
                    <span class="logo-text">Cripto Guard</span>
                </div>
                <div class="nav-links">
                    <a href="#">Inicio</a>
                    <a href="#">Foro</a>
                    <a href="#">Alertas</a>
                    <a href="#">Recursos</a>
                    <a href="#">Comunidad</a>
                </div>
                <div class="auth-buttons">
                    <a href="{{ route('signup') }}" class="btn btn-signup">Registrarse</a>
                    <a href="{{ route('login') }}" class="btn btn-login">Iniciar Sesión</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">La Plataforma Definitiva para Compartir Amenazas de Seguridad</h1>
                <p class="hero-subtitle">Únete a una comunidad global de expertos en ciberseguridad para compartir, analizar y responder a vulnerabilidades emergentes en tiempo real.</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary">Explorar Amenazas</button>
                    <button class="btn btn-secondary">Cómo Funciona</button>
                </div>
            </div>
            <div class="hero-image">
                <!-- Imagen representativa de dashboard de seguridad -->
                <img src="{{ asset('resources/cybersecurity.jpg') }}" alt="Dashboard de Seguridad">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Características Principales</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-bell feature-icon"></i>
                    <h3 class="feature-title">Alertas en Tiempo Real</h3>
                    <p class="feature-description">Recibe notificaciones inmediatas sobre nuevas vulnerabilidades y amenazas emergentes en tu área de interés.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-users feature-icon"></i>
                    <h3 class="feature-title">Comunidad Verificada</h3>
                    <p class="feature-description">Conecta con expertos verificados en ciberseguridad y comparte conocimientos en un entorno confiable.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="feature-title">Análisis Detallado</h3>
                    <p class="feature-description">Accede a análisis profundos, métricas de impacto y soluciones propuestas por la comunidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Expertos Registrados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12,450+</div>
                    <div class="stat-label">Amenazas Reportadas</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Tiempo de Respuesta</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Monitoreo Activo</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2 class="cta-title">¿Listo para Unirte a la Comunidad?</h2>
            <p class="cta-subtitle">Regístrate hoy y comienza a contribuir a un ecosistema más seguro. Comparte tus hallazgos, colabora con expertos y mantente un paso adelante de las amenazas.</p>
            <button class="btn btn-primary">Crear Cuenta Gratis</button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3 class="footer-title">CyberAlert</h3>
                    <p>La plataforma líder para compartir y analizar amenazas de ciberseguridad en tiempo real.</p>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Enlaces Rápidos</h3>
                    <ul class="footer-links">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Foro</a></li>
                        <li><a href="#">Alertas</a></li>
                        <li><a href="#">Recursos</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Legal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Términos de Servicio</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Directrices de la Comunidad</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Contacto</h3>
                    <ul class="footer-links">
                        <li><a href="#">Soporte</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 CyberAlert. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Efecto de contador para las estadísticas
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach(stat => {
                const target = parseInt(stat.textContent);
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current) + (stat.textContent.includes('%') ? '%' : '+');
                }, 20);
            });
        });
    </script>
</body>
</html>