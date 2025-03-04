<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Registro de Users</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/register') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-control" id="role" name="role" required>
                <option value="usuario">Usuario</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>

    <p class="text-center mt-3">¿Ya tienes cuenta? <a href="<?= base_url('/login') ?>">Inicia sesión</a></p>
</div>
</body>
</html>



