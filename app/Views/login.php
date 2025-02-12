<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/process-login') ?>" method="post">
        <?= csrf_field() ?>

        <label for="email">Correo:</label>
        <input type="email" name="email" required>
        <span style="color:red;"><?= session('validation.email') ?></span>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <span style="color:red;"><?= session('validation.password') ?></span>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <p>¿No tienes cuenta? <a href="<?= base_url('/register') ?>">Regístrate</a></p>
</body>
</html>
