<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Entrada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($entrada) ? 'Editar Entrada' : 'Crear Entrada' ?></h1>
    <form method="post" action="<?= base_url('entradas/save' . (isset($entrada) ? '/' . $entrada['id'] : '')) ?>">
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario ID</label>
            <input type="text" class="form-control" id="usuario_id" name="usuario_id" value="<?= isset($entrada['usuario_id']) ? esc($entrada['usuario_id']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="festival_id" class="form-label">Festival ID</label>
            <input type="text" class="form-control" id="festival_id" name="festival_id" value="<?= isset($entrada['festival_id']) ? esc($entrada['festival_id']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="tipo_entrada" class="form-label">Tipo de Entrada</label>
            <input type="text" class="form-control" id="tipo_entrada" name="tipo_entrada" value="<?= isset($entrada['tipo_entrada']) ? esc($entrada['tipo_entrada']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?= isset($entrada['precio']) ? esc($entrada['precio']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="fecha_compra" class="form-label">Fecha de Compra</label>
            <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" value="<?= isset($entrada['fecha_compra']) ? esc($entrada['fecha_compra']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($entrada) ? 'Actualizar Entrada' : 'Crear Entrada' ?></button>
    </form>
</div>
</body>
</html>
