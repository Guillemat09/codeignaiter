<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Artistas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Festivales</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('festivales/save') ?>" class="btn btn-primary mb-3">Crear Artista</a>

    <?php if (!empty($festivales) && is_array($festivales)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Lugar</th>
                    <th>Fecha creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($festivales as $festival): // Aquí es donde hice el cambio ?>
                    <tr>
                        <td><?= esc($festival['id']) ?></td>
                        <td><?= esc($festival['nombre']) ?></td>
                        <td><?= esc($festival['descripcion']) ?></td>
                        <td><?= esc($festival['fecha_inicio']) ?></td>
                        <td><?= esc($festival['fecha_fin']) ?></td>
                        <td><?= esc($festival['lugar']) ?></td>
                        <td><?= esc($festival['fecha_creacion']) ?></td>
                        <td>
                            <a href="<?= base_url('festivales/save/' . $festival['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('festivales/delete/' . esc($festival['id'])) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este festival?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No hay festivales registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
