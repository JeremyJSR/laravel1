<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>Operacion realizada: <?= $operacion ?></p>
    <p>Operador 1: <?= $numero1 ?></p>
    <p>Operador 2: <?= $numero2 ?></p>
    <p>Resuladado: <?= $resultado ?></p>
    <br><br><br>
    <p>AHORA LO QUE HAYA EN LA SESION: </p><br>
    <?= session()-> get('loquesea');  ?><br><br>

    <a href="/">Volver</a>
</body>
</html>
