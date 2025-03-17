<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="validarC" method="post">
        {{ csrf_field()}}
        Matricula:  <input type="text" name="matricula" ><br>
        Marca: <input type="text" name="marca" id=""><br>
        Modelo: <input type="text" name="modelo" id=""><br>
        <input type="submit" value="Buscar" name="buscar">
        <input type="submit" value="Registrar" name="registrar">
        <input type="submit" value="Borrar" name="borrar">
        <input type="submit" value="Modificar" name="modificar">
        <input type="submit" value="Vertodos" name="vertodos">
    </form>
</body>
</html>
