<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($artista) ? 'Editar Artista' : 'Crear Artista' ?></title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= isset($artista) ? 'Editar Artista' : 'Crear Artista' ?></h3>
        </div>
        <div class="card-body">
            <!-- Mostrar errores de validación -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <!-- Mostrar mensaje de éxito -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form action="<?= isset($artista) ? base_url('artistas/save/') . $artista['id'] : base_url('artistas/save') ?>" method="post">
    <?= csrf_field(); ?>
    <div class="mb-5">
        <label for="nombre" class="form-label fw-bold">Nombre<span style="color: red;">*</span></label>
        <input type="text" name="nombre" id="nombre" class="form-control form-control-solid" 
               value="<?= isset($artista) ? esc($artista['nombre']) : '' ?>" required placeholder="Ingrese el nombre del artista">
    </div>
    <div class="mb-5">
        <label for="descripcion" class="form-label fw-bold">Descripción<span style="color: red;">*</span></label>
        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-solid" 
               value="<?= isset($artista) ? esc($artista['descripcion']) : '' ?>" required placeholder="Ingrese una descripción del artista">
    </div> 
    <div class="mb-5">
        <label for="genero" class="form-label fw-bold">Género<span style="color: red;">*</span></label>
        <input type="text" name="genero" id="genero" class="form-control form-control-solid" 
               value="<?= isset($artista) ? esc($artista['genero']) : '' ?>" required placeholder="Ingrese el género musical del artista">
    </div> 
    <div class="text-center">
        <button type="submit" class="btn btn-primary">
            <?= session()->getFlashdata('success') == 'Artista creado correctamente.' ? 'Artista creado correctamente' : (isset($artista) ? 'Actualizar' : 'Guardar') ?>
        </button>
        <a href="<?= base_url('artistas') ?>" class="btn btn-light">Cancelar</a>
    </div>
</form>

        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>
