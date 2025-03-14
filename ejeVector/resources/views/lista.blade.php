<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!----- aqui se mostrara los elementos del vector-->
    <?php
        if(session()->has('vector')){
            //recuperamos el vector y mostramos los elementos
            $vec = session()->get('vector');
            foreach ($vec as $clave => $valor){


    ?>
        <form action="modificar" method="post">
            {{csrf_field()}}
            <input type="hidden" name="posicion" value="<?= $clave?>">
            <input type="number" name="vector" value="<?= $valor ?>">
            <input type="submit" name="modificacion" value="Editar">
            <input type="submit" name="modificacion" value="Eliminar">
        </form>
    <?php
            }
        }
    ?>
    <!---aqui se añaden elementos al vector--->
    <h3>introduce un nuymero</h3>
    <form action="anadir" method="post">
        {{csrf_field()}}
        <input type="number" name="numero" >
        <input type="submit" name="btn_anadir" value="Añadir">
    </form>
</body>
</html>
