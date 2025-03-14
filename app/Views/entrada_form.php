<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Entrada</title>
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-10">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= isset($entrada) ? 'Editar Entrada' : 'Crear Entrada' ?></h3>
        </div>
        <div class="card-body">
        <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('entradas/save' . (isset($entrada) ? '/' . $entrada['id'] : '')) ?>">
                <div class="mb-5">
                    <label for="usuario_id" class="form-label fw-bold">Usuario<span style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-solid" id="usuario_id" name="usuario_id" value="<?= isset($entrada['usuario_id']) ? esc($entrada['usuario_id']) : '' ?>" required>
                </div>
                <div class="mb-5">
                    <label for="festival_id" class="form-label fw-bold">Festival<span style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-solid" id="festival_id" name="festival_id" value="<?= isset($entrada['festival_id']) ? esc($entrada['festival_id']) : '' ?>" required>
                </div>
                <div class="mb-5">
                    <label for="tipo_entrada" class="form-label fw-bold">Tipo de Entrada<span style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-solid" id="tipo_entrada" name="tipo_entrada" value="<?= isset($entrada['tipo_entrada']) ? esc($entrada['tipo_entrada']) : '' ?>" required>
                </div>
                <div class="mb-5">
                    <label for="precio" class="form-label fw-bold">Precio<span style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-solid" id="precio" name="precio" value="<?= isset($entrada['precio']) ? esc($entrada['precio']) : '' ?>" required>
                </div>
                <div class="mb-5">
                    <label for="fecha_compra" class="form-label fw-bold">Fecha de Compra<span style="color: red;">*</span></label>
                    <input type="date" class="form-control form-control-solid" id="fecha_compra" name="fecha_compra" value="<?= isset($entrada['fecha_compra']) ? esc($entrada['fecha_compra']) : '' ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?= isset($entrada) ? 'Actualizar Entrada' : 'Crear Entrada' ?></button>
                    <a href="<?= base_url('entradas') ?>" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="https://preview.keenthemes.com/metronic8/demo1/assets/js/scripts.bundle.js"></script>
</body>
</html>
