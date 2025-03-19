<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Usuarios</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usu): ?>
                    <tr>
                        <td><?= $usu->login ?></td>
                        <td><?= $usu->password ?></td>
                        <td><?= $usu->email ?></td>
                        <td>
                            <form action="edit" method="POST" style="display:inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="accion" value="edit">
                                <input type="hidden" name="id" value="<?= $usu->id ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Modificar</button>
                            </form>
                            <form action="delete" method="POST" style="display:inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="accion" value="delete">
                                <input type="hidden" name="id" value="<?= $usu->id ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="anadir" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="accion" value="add">
            <button type="submit" class="btn btn-success">Añadir Usuario</button>
        </form>
        {{-- <a href="/" class="btn btn-secondary mt-3">Volver</a> --}}
    </div>
</body>
</html>
