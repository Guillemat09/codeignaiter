<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($artista) ? 'Editar Artista' : 'Crear Artista' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($artista) ? 'Editar Artista' : 'Crear Artista' ?></h1>

    <!-- Mostrar errores de validación -->
    <!-- <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?> -->

    <!-- Formulario -->
    <form action="<?= isset($artista) ? base_url('artistas/save/') . $artista['id'] : base_url('artistas/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="<?= isset($artista) ? esc($artista['nombre']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" 
                   value="<?= isset($artista) ? esc($artista['descripcion']) : '' ?>" required>
        </div> 
        <div class="mb-3">
        <label for="genero" class="form-label">Genero</label>
            <input type="text" name="genero" id="genero" class="form-control" 
                   value="<?= isset($artista) ? esc($artista['genero']) : '' ?>" required>
        </div> 
        <button type="submit" class="btn btn-success"><?= isset($artista) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('artistas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>