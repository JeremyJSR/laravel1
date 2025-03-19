<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2><?= $mensaje ?></h2>
    <?php
        foreach ($personas as $pers) {
    ?>
            <input type="email  " name="email" value="<?= $pers->email?>" readonly>
            <input type="text" name="nombre" value="<?= $pers->nombre?>">
            <input type="text" name="password" value="<?= $pers->pass?>"><br>
        <?php
        }
        ?>
        <a href="/">Volver</a>
</body>
</html>
