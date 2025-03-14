
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($user) ? 'Editar Usuario' : 'Crear Usuario' ?></title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title text-center"><?= isset($user) ? 'Editar Usuario' : 'Crear Usuario' ?></h3>
        </div>
        <div class="card-body">
            <!-- Mostrar errores de validación -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form action="<?= isset($user) ? base_url('users/save/') . $user['id'] : base_url('users/save') ?>" method="post">
    <?= csrf_field(); ?>
    <div class="mb-5">
        <label for="name" class="form-label fw-bold">Nombre<span style="color: red;">*</span></label>
        <input type="text" name="name" id="name" class="form-control form-control-solid" 
               value="<?= isset($user) ? esc($user['name']) : '' ?>" placeholder="Introduce tu nombre" required>
    </div>
    <div class="mb-5">
        <label for="email" class="form-label fw-bold">Correo<span style="color: red;">*</span></label>
        <input type="email" name="email" id="email" class="form-control form-control-solid" 
               value="<?= isset($user) ? esc($user['email']) : '' ?>" placeholder="Introduce tu correo electrónico" required>
    </div>
    <div class="mb-5">
        <label for="password" class="form-label fw-bold">Contraseña<span style="color: red;">*</span></label>
        <input type="password" name="password" id="password" class="form-control form-control-solid" 
               value="<?= isset($user) ? esc($user['password']) : '' ?>" placeholder="Introduce tu contraseña" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('users') ?>" class="btn btn-light">Cancelar</a>
    </div>
</form>
        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>

