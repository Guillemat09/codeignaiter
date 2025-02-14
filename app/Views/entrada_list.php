<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Entradas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Entradas</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('entradas/save') ?>" class="btn btn-primary mb-3">Crear Entrada</a>

    <!-- Formulario de filtros -->
    <form method="get" action="<?= base_url('entradas') ?>">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="usuario_id" class="form-control" placeholder="Filtrar por usuario ID" value="<?= isset($filters['usuario_id']) ? esc($filters['usuario_id']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="festival_id" class="form-control" placeholder="Filtrar por festival ID" value="<?= isset($filters['festival_id']) ? esc($filters['festival_id']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="tipo_entrada" class="form-control" placeholder="Filtrar por tipo de entrada" value="<?= isset($filters['tipo_entrada']) ? esc($filters['tipo_entrada']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="precio" class="form-control" placeholder="Filtrar por precio" value="<?= isset($filters['precio']) ? esc($filters['precio']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="fecha_compra" class="form-control" placeholder="Filtrar por fecha de compra" value="<?= isset($filters['fecha_compra']) ? esc($filters['fecha_compra']) : '' ?>">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <?php if (!empty($entradas) && is_array($entradas)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario ID</th>
                    <th>Festival ID</th>
                    <th>Tipo de Entrada</th>
                    <th>Precio</th>
                    <th>Fecha de Compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $entrada): ?>
                    <tr>
                        <td><?= esc($entrada['id']) ?></td>
                        <td><?= esc($entrada['usuario_id']) ?></td>
                        <td><?= esc($entrada['festival_id']) ?></td>
                        <td><?= esc($entrada['tipo_entrada']) ?></td>
                        <td><?= esc($entrada['precio']) ?></td>
                        <td><?= esc($entrada['fecha_compra']) ?></td>
                        <td>
                            <a href="<?= base_url('entradas/save/' . $entrada['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('entradas/delete/' . esc($entrada['id'])) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta entrada?');">Eliminar</a>
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
        <p class="text-center">No hay entradas registradas.</p>
    <?php endif; ?>
</div>
</body>
</html>
