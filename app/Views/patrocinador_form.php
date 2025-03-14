<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($patrocinador) ? 'Editar Patrocinador' : 'Crear Patrocinador' ?></title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= isset($patrocinador) ? 'Editar Patrocinador' : 'Crear Patrocinador' ?></h3>
        </div>
        <div class="card-body">
            <!-- Mostrar errores de validación -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form action="<?= isset($patrocinador) ? base_url('patrocinadores/save/') . $patrocinador['id'] : base_url('patrocinadores/save') ?>" method="post">
    <?= csrf_field(); ?>
    <div class="mb-5">
        <label for="nombre" class="form-label fw-bold">Nombre<span style="color: red;">*</span></label>
        <input type="text" name="nombre" id="nombre" class="form-control form-control-solid" 
               value="<?= isset($patrocinador) ? esc($patrocinador['nombre']) : '' ?>" required placeholder="Ingrese el nombre del patrocinador">
    </div>
    <div class="mb-5">
        <label for="descripcion" class="form-label fw-bold">Descripción<span style="color: red;">*</span></label>
        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-solid" 
               value="<?= isset($patrocinador) ? esc($patrocinador['descripcion']) : '' ?>" required placeholder="Ingrese una descripción breve">
    </div> 
    <div class="mb-5">
        <label for="contacto" class="form-label fw-bold">Contacto<span style="color: red;">*</span></label>
        <input type="text" name="contacto" id="contacto" class="form-control form-control-solid" 
               value="<?= isset($patrocinador) ? esc($patrocinador['contacto']) : '' ?>" required placeholder="Ingrese el contacto del patrocinador">
    </div> 
    <div class="text-center">
        <button type="submit" class="btn btn-primary"><?= isset($patrocinador) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('patrocinadores') ?>" class="btn btn-light">Cancelar</a>
    </div>
</form>

        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>
