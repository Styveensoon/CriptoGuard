<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #1a0933;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #e2e8f0;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: #1f0b3d;
            border-radius: 14px;
            overflow: hidden;
            padding: 30px;
            box-shadow: 0 0 30px rgba(0,0,0,0.4);
        }

        .header {
            text-align: center;
            padding: 20px;
            color: #34bb44;
            font-size: 28px;
            font-weight: bold;
        }

        .tagline {
            text-align: center;
            font-size: 16px;
            margin-top: -10px;
            color: #ff0080;
        }

        .content {
            margin-top: 25px;
            font-size: 16px;
            line-height: 1.7;
        }

        .welcome-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-left: 4px solid #34bb44;
            border-radius: 10px;
            margin: 20px 0;
        }

        .button {
            display: inline-block;
            margin-top: 25px;
            padding: 14px 28px;
            background: #34bb44;
            color: #1a0933;
            text-decoration: none;
            font-weight: bold;
            border-radius: 50px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .button:hover {
            background: #28a63a;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 13px;
            color: #8b75a4;
        }

        .accent {
            color: #ff0080;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .email-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="email-wrapper">

    <div class="header">¡Bienvenido a Cryto Guard!</div>
    <div class="tagline">Tu seguridad es nuestra prioridad</div>

    <div class="content">
        Hola <span class="accent">{{ $user->name }}</span>,<br><br>

        Gracias por registrarte en <strong>Cryto Guard</strong>.  
        Estamos emocionados de que formes parte de nuestra comunidad dedicada a crear un entorno digital más seguro.

        <div class="welcome-box">
            ⭐ Accederás a alertas inteligentes<br>
            🔐 Tecnología enfocada en ciberseguridad<br>
            ⚡ Un panel intuitivo y moderno<br>
            💬 Soporte directo cuando lo necesites
        </div>

        Para comenzar, accede a tu cuenta:

        <br>

        <a href="{{ url('/login') }}" class="button">Ir al Panel</a>

        <br><br>

        Si necesitas ayuda, estamos aquí para ti.  
        Bienvenido nuevamente, <strong>es un placer tenerte con nosotros.</strong>
    </div>

    <div class="footer">
        © {{ date('Y') }} Cryto Guard — Todos los derechos reservados.
    </div>

</div>

</body>
</html>
