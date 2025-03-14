<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Calculadora</h2>

    <form action="resultado" method="post">
        {{ csrf_field() }}
        <input type="number" name="numero1"><br>
        <input type="number" name="numero2"><br>
        <input type="submit" name="aceptar" value="sumar">
        <input type="submit" name="aceptar" value="restar">
        <input type="submit" name="aceptar" value="multiplicar">
        <input type="submit" name="aceptar" value="dividir">
    </form>
</body>
</html>
