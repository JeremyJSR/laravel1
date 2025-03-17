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
        if (isset($pers)) {
            foreach ($pers as $pos => $p) {
                echo $p->DNI . ' - ' . $p->Nombre .' - ' . $p->Tfno . ' - ' . $p->edad . '<br>';
            }
        }
        if (isset($coches))
             foreach ($coches as $pos => $c) {
                 echo $c->Matricula . ' - ' . $c->Modelo .' - ' . $c->Marca .'<br>';
             }
            // dd($pers);
            // foreach ($pers as $pos => $p) {
            //     echo $p->DNI . ' - ' . $p->Nombre .' - ' . $p->Tfno . ' - ' . $p->edad . '<br>';
            // }
        ?>
        <a href="indice">Volver</a>
</body>
</html>
