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
        echo $mensaje. '<br>';
        if (isset($pers)) {
            echo $pers->DNI;
            echo $pers->nombre . ' ';
            echo $pers->Tlno . ' ';
            echo $pers->edad . ' ';
        };
        if (isset($coch)) {
            echo $coch->Matricula . ' --- ' ;
            echo $coch->Marca . ' --- ';
            echo $coch->Modelo . ' --- ';
        };
    ?>
    <a href="indice">Volver</a>
</body>
</html>
