<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <?php
        if(isset($mensaje)){
            echo $mensaje;
        }

        ?>
<form action="comprobar" method="post">
    {{ csrf_field() }}
    Usuario: <input type="text" name="email" id=""><br>
    Contraseña: <input type="password" name="pass" id=""><br>
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Nuevo Registro" name="registrar">
</form>
    </body>
</html>
