<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cryptoguard</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn-logout">
        Cerrar Sesión
    </button>
</form>
<style>
.btn-logout {
    background: #e74c3c;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
}

.btn-logout:hover {
    background: #c0392b;
}
</style>
<h2>Crear Artículo</h2>

<form action="{{ route('articulos.store') }}" method="POST">
    @csrf

    <label>Título</label>
    <input type="text" name="titulo" required>

    <label>Contenido</label>
    <textarea name="contenido"></textarea>

    <label>Categoría</label>
    <input type="text" name="categoria">

    <label>Fuente</label>
    <input type="text" name="fuente">

    <label>URL</label>
    <input type="text" name="url">

    <button type="submit">Crear</button>
</form>


</body>
</html>