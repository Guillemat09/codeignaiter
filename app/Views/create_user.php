<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h2>Crear Usuario</h2>

    <?php if (isset($validation)): ?>
        <div style="color: red;">
            <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/home/create') ?>" method="post">
        <?= csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= set_value('name') ?>">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= set_value('email') ?>">
        <br>

        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>
