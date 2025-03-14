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
             foreach ($pers as $pos => $p) {
                 echo $p->DNI . ' - ' . $p->Nombre .' - ' . $p->Tfno . ' - ' . $p->edad . '<br>';
             }
            // dd($pers);
            // foreach ($pers as $pos => $p) {
            //     echo $p->DNI . ' - ' . $p->Nombre .' - ' . $p->Tfno . ' - ' . $p->edad . '<br>';
            // }
        ?>
        <a href="indice">Volver</a>
</body>
</html>
