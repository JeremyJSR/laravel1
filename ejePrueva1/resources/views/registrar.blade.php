<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Formulario de registro</h2>
    <form action="registrar" method="post">
        {{ csrf_field() }}
        <label for="">Correo</label>
        <input type="email" name="email" id=""><br>
        <label for="">Nombre: </label>
        <input type="text" name="nombre"><br>
        <label for="">Contraseña</label>
        <input type="password" name="pass" id=""><br>
        <input type="submit" value="Registrar" name="registrar">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>
</html>
