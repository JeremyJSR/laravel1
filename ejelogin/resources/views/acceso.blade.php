<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    session()->get('usuario');
    echo 'Bienvenid@: ' . $usuario[0]->nombre . '<br>';

    foreach ($usuario as $usu) {

    ?>

    <form action="actualizar" method="post">
        {{ csrf_field() }}
        <input type="text" value="<?= $usu->email ?>" readonly name="email">
        <input type="text" value="<?= $usu->nombre ?>" name="nombre">
        <input type="text" value="<?= $usu->edad ?>"  name="edad">

        <input type="submit" value="Modificar" name="modificar">
        <input type="submit" value="Eliminar" name="eliminar">

    </form>
    <?php
    }

    ?>
    <a href="/">volver</a>
</body>
</html>
