<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($festival) ? 'Editar Festival' : 'Crear Festival' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($festival) ? 'Editar Festival' : 'Crear Festival' ?></h1>

    <!-- Mostrar errores de validación -->
    <!-- <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?> -->

    <!-- Formulario -->
    <form action="<?= isset($festival) ? base_url('festivales/save/') . $festival['id'] : base_url('festivales/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="<?= isset($festival) ? esc($festival['nombre']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" 
                   value="<?= isset($festival) ? esc($festival['descripcion']) : '' ?>" required>
        </div> 
        <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
            <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control" 
                   value="<?= isset($festival) ? esc($festival['fecha_inicio']) : '' ?>" required>
        </div> 
        <div class="mb-3">
        <label for="fecha_fin" class="form-label">Fecha fin</label>
            <input type="text" name="fecha_fin" id="fecha_fin" class="form-control" 
                   value="<?= isset($festival) ? esc($festival['fecha_fin']) : '' ?>" required>
        </div> 
        <div class="mb-3">
        <label for="lugar" class="form-label">Lugar</label>
            <input type="text" name="lugar" id="lugar" class="form-control" 
                   value="<?= isset($festival) ? esc($festival['lugar']) : '' ?>" required>
        </div> 
        <button type="submit" class="btn btn-success"><?= isset($festival) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('festivales') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>