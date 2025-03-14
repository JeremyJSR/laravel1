<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Adivina el numero aleatorio entre 1 y 100</p>
    <form action="adivina" method="post">
        {{ csrf_field() }}
        <label for="">Entroducir Numero:
            <input type="number" name="numero"><br>
            <input type="submit" name="accion" value="Empezar partida">
            <input type="submit" name="accion" value="Me rindo">
            <input type="submit" name="accion" value="Aceptar">
        </label>

    </form>
</body>
</html>
