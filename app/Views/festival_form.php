<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($festival) ? 'Editar Festival' : 'Crear Festival' ?></title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= isset($festival) ? 'Editar Festival' : 'Crear Festival' ?></h3>
        </div>
        <div class="card-body">
            <!-- Mostrar errores de validación -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <!-- Formulario -->
            <form action="<?= isset($festival) ? base_url('festivales/save/') . $festival['id'] : base_url('festivales/save') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-5">
                    <label for="nombre" class="form-label fw-bold">Nombre<span style="color: red;">*</span></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-solid" 
                           value="<?= isset($festival) ? esc($festival['nombre']) : '' ?>" required>
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="form-label fw-bold">Descripción<span style="color: red;">*</span></label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control form-control-solid" 
                           value="<?= isset($festival) ? esc($festival['descripcion']) : '' ?>" required>
                </div> 
                <div class="mb-5">
                    <label for="fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-control-solid" 
                           value="<?= isset($festival) ? esc($festival['fecha_inicio']) : '' ?>" required>
                </div> 
                <div class="mb-5">
                    <label for="fecha_fin" class="form-label fw-bold">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control form-control-solid" 
                           value="<?= isset($festival) ? esc($festival['fecha_fin']) : '' ?>" required>
                </div> 
                <div class="mb-5">
                    <label for="lugar" class="form-label fw-bold">Lugar</label>
                    <input type="text" name="lugar" id="lugar" class="form-control form-control-solid" 
                           value="<?= isset($festival) ? esc($festival['lugar']) : '' ?>" required>
                </div> 
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?= isset($festival) ? 'Actualizar' : 'Guardar' ?></button>
                    <a href="<?= base_url('festivales') ?>" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>
