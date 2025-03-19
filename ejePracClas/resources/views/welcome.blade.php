<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Iniciar Sesión</h1>
        <?php
            session()->forget('usuario');
            if (isset($mensaje)) {
                echo '<div class="alert alert-info">' . $mensaje . '</div>';
            }
        ?>
        <form action="validar" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Introduce tu login" required>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Introduce tu contraseña" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnAceptar">Aceptar</button>
                <button type="reset" class="btn btn-secondary" name="btnLimpiar">Limpiar</button>
            </div>
        </form>
    </div>
</body>
</html>
