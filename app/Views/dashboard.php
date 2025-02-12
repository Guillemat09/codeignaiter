<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?= session('name') ?>!</h2>
    <p>Tu correo: <?= session('email') ?></p>
    <p>Tu rol: <strong><?= ucfirst(session('role')) ?></strong></p>

    <form action="<?= base_url('/logout') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>
