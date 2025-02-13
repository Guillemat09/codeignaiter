<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Patrocinadores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Patrocinadores</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('patrocinadores/save') ?>" class="btn btn-primary mb-3">Crear Patrocinador</a>

    <?php if (!empty($patrocinadores) && is_array($patrocinadores)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Contacto</th>
                    <th>Festival id</th>
                    <th>Fecha creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($patrocinadores as $patrocinador): // Cambiar $patrocinadores a $patrocinador ?>
    <tr>
        <td><?= esc($patrocinador['id']) ?></td>
        <td><?= esc($patrocinador['nombre']) ?></td>
        <td><?= esc($patrocinador['descripcion']) ?></td>
        <td><?= esc($patrocinador['contacto']) ?></td>
        <td><?= esc($patrocinador['festival_id']) ?></td>
        <td><?= esc($patrocinador['fecha_creacion']) ?></td>
        <td>
            <a href="<?= base_url('patrocinadores/save/' . $patrocinador['id']) ?>" class="btn btn-warning">Editar</a>
            <a href="<?= base_url('patrocinadores/delete/' . $patrocinador['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Patrocinador?');">Eliminar</a>
        </td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No hay patrocinadores registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
