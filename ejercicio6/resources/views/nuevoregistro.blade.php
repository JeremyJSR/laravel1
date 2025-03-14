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
            echo $mensaje.'<BR>';
?>
            <form action="/" method="get">
                <input type="submit" value="Volver" name="volver">
            </form>
<?php
        } else {
?>
            <form action="registrar" method="post">
                {{ csrf_field() }}
                Email: <input type="text" name="email" ><br>
                Nombre: <input type="text" name="nombre"><br>
                Edad: <input type="text" name="edad"><br>
                Contraseña: <input type="password" name="pass" ><br>
                <input type="submit" value="Aceptar" name="aceptar">
                <input type="submit" value="Cancelar" name="cancelar">
            </form>
            <br>
<?php
        }
?>


</html>
