<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CyberAlert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
    <link rel="icon" href="{{ asset('resources/bicho.png') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-logo">
            <i class="fas fa-shield-alt auth-logo-icon"></i>
            <span class="auth-logo-text">Cryto Guard</span>
        </div>
        
        <h2 class="auth-title">Iniciar Sesión</h2>
        <p class="auth-subtitle">Ingresa a tu cuenta para acceder a las alertas</p>
        
        <form action="{{ route('login.post') }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="tu.correo@ejemplo.com" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Tu contraseña" required>
                    <button type="button" class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        
        <div class="auth-switch">
            ¿No tienes cuenta? <a href="{{ route('signup') }}" class="auth-link">Regístrate aquí</a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>