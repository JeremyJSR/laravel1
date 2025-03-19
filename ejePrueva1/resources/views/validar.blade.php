<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <h1>Accede o Registrate</h1>
        <?php
            session()->forget('persona');
            if(isset($mensaje)){
                echo $mensaje . "<br><br>";
            }
        ?>
        <form action="validar" method="post">
            {{ csrf_field() }}
            <label for="">Usuario</label>
            <input type="email" name="correo"><br>
            <label for="">Contraseña</label>
            <input type="password" name="pass"><br>
            <input type="submit" name="accion" value="Acceder">
            <input type="submit" name="accion" value="Registrar">
            <input type="submit" name="accion" value="Ver todos">
        </form>
    </body>
</html>
