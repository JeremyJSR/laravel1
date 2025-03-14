<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="vista" method="post">
        {{ csrf_field() }}
        Nombre: <input type="text" name="nombre" id=""><br>
        Edad: <input type="number" name="numero" id=""><br>

        <label for="bebida">Bebida:</label>
        <select name="bebidas" id="">
            <option value="cerveza">Cerveza</option>
            <option value="cocacola">Coca Cola</option>
            <option value="tonica">Tónica</option>
            <option value="vino">Vino</option>
        </select><br>

        <label for="aficiones">Aficiones:</label><br>
        <input type="radio" name="aficiones" value="cine"> Cine<br>
        <input type="radio" name="aficiones" value="musica"> Música<br>
        <input type="radio" name="aficiones" value="deporte"> Deporte<br>

        <label for="comentarios">Comentarios adicionales:</label><br>
        <textarea name="comentarios" id="" rows="4" cols="40"></textarea><br>

        <input type="submit" name="aceptar" value="Aceptar">
    </form>

</body>
</html>
