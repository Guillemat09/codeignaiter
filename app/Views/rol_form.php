<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Rol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($rol) ? 'Editar Rol' : 'Crear Rol' ?></h1>
    <form method="post" action="<?= base_url('roles/save' . (isset($rol) ? '/' . $rol['id'] : '')) ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= isset($rol['nombre']) ? esc($rol['nombre']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($rol) ? 'Actualizar Rol' : 'Crear Rol' ?></button>
    </form>
</div>
</body>
</html>
