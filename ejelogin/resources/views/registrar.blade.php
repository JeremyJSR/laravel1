<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="registro" method="post">
        {{ csrf_field() }}
        <label for="">Email: </label>
        <input type="email" name="email" required><br>
        <label for="">Nombre: </label>
        <input type="text" name="nombre" required><br>
        <label for="">Edad: </label>
        <input type="number" name="edad" required><br>
        <label for="">Contraseña: </label>
        <input type="password" name="pass" required><br>
        <input type="submit" value="Aceptar" name="guardar">
        <a href="/">
            <button type="button">Cancelar</button>
        </a>
    </form>
</body>
</html>
