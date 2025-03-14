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
$user=session()->get('usuario');
echo 'Bienvenid@: '.$user[0]->nombre.'<br>';

foreach ($users as $objUsu) {

   ?>
       <form action="actualizar" method="post">
           {{ csrf_field() }}
    <input type="text" name="email" id="" value="<?=$objUsu->email?>" readonly >
    <input type="text" name="nombre" id="" value="<?=$objUsu->nombre?>">
    <input type="text" name="edad" id="" value="<?=$objUsu->edad?>">
    <input type="submit" value="editar" name="editar">
    <input type="submit" value="borrar" name="borrar">
    </form>
    <?php
}
?>
    <br>
     <a href='/'>Volver</a>
</body>
</html>
