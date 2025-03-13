<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Roles</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('roles/save') ?>" class="btn btn-primary mb-3">Crear Rol</a>

    <!-- Formulario de filtros -->
    <form method="get" action="<?= base_url('roles') ?>">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nombre" class="form-control" placeholder="Filtrar por nombre" value="<?= isset($filters['nombre']) ? esc($filters['nombre']) : '' ?>">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <?php if (!empty($roles) && is_array($roles)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $rol): ?>
                    <tr>
                        <td><?= esc($rol['id']) ?></td>
                        <td><?= esc($rol['nombre']) ?></td>
                        <td>
                            <a href="<?= base_url('roles/save/' . $rol['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('roles/delete/' . esc($rol['id'])) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este rol?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Enlaces de paginación -->
        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    <?php else: ?>
        <p class="text-center">No hay roles registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
