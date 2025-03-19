<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido <?= $mensaje ?></h2>
    <?php
        foreach ($personas as $pers) {
    ?>
        <form action="actualizar" method="post">
            <input type="email  " name="email" value="<?= $pers->email?>" readonly>
            <input type="text" name="nombre" value="<?= $pers->nombre?>">
            <input type="text" name="password" value="<?= $pers->pass?>">
            <input type="submit" value="Modificar" name="modificar">
            <input type="submit" value="Eliminar" name="eliminar">
        </form><br><br>
        <?php
        }
        ?>
        <a href="/">Volver</a>
</body>
</html>
