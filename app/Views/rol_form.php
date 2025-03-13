<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($rol) ? 'Editar Rol' : 'Crear Rol' ?></title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= isset($rol) ? 'Editar Rol' : 'Crear Rol' ?></h3>
        </div>
        <div class="card-body">
            <!-- Formulario -->
            <form method="post" action="<?= base_url('roles/save' . (isset($rol) ? '/' . $rol['id'] : '')) ?>">
                <?= csrf_field(); ?>
                <div class="mb-5">
                    <label for="nombre" class="form-label fw-bold">Nombre del Rol<span style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-solid" id="nombre" name="nombre" 
                           value="<?= isset($rol['nombre']) ? esc($rol['nombre']) : '' ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?= isset($rol) ? 'Actualizar Rol' : 'Crear Rol' ?></button>
                    <a href="<?= base_url('roles') ?>" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>

