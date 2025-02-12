<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/process-register') ?>" method="post">
        <?= csrf_field() ?>

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= old('name') ?>" required>
        <span style="color:red;"><?= session('validation.name') ?></span>

        <label for="email">Correo:</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>
        <span style="color:red;"><?= session('validation.email') ?></span>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <span style="color:red;"><?= session('validation.password') ?></span>

        <label for="password_confirm">Confirmar Contraseña:</label>
        <input type="password" name="password_confirm" required>
        <span style="color:red;"><?= session('validation.password_confirm') ?></span>

        <label for="role">Rol:</label>
        <select name="role" required>
            <option value="usuario">Usuario</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="<?= base_url('/login') ?>">Inicia sesión</a></p>
</body>
</html>
