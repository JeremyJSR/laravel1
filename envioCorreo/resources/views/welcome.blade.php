<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
       <form action="enviar" method="post">
        {{ csrf_field() }}
        <label for="">Correo de destino: </label>
        <input type="email" name="correo_destino" id=""><br>
        <label for="observaciones"></label>
        <textarea name="texto" id="" cols="30" rows="10"></textarea><br>

        <input type="submit" name="enviar" value="enviar">
       </form>
    </body>
</html>
