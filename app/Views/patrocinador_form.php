<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($patrocinador) ? 'Editar Patrocinador' : 'Crear Patrocinador' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($patrocinador) ? 'Editar Patrocinador' : 'Crear Patrocinador' ?></h1>

    <!-- Mostrar errores de validación -->
    <!-- <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?> -->

    <!-- Formulario -->
    <form action="<?= isset($patrocinador) ? base_url('patrocinadores/save/') . $patrocinador['id'] : base_url('patrocinadores/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="<?= isset($patrocinador) ? esc($patrocinador['nombre']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" 
                   value="<?= isset($patrocinador) ? esc($patrocinador['descripcion']) : '' ?>" required>
        </div> 
        <div class="mb-3">
        <label for="contacto" class="form-label">Contacto</label>
            <input type="text" name="contacto" id="contacto" class="form-control" 
                   value="<?= isset($patrocinador) ? esc($patrocinador['contacto']) : '' ?>" required>
        </div> 
        <button type="submit" class="btn btn-success"><?= isset($patrocinador) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('patrocinadores') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>