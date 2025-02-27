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

    <!-- Formulario de filtros -->
    <form method="get" action="<?= base_url('patrocinadores') ?>">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nombre" class="form-control" placeholder="Filtrar por nombre" value="<?= isset($filters['nombre']) ? esc($filters['nombre']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="descripcion" class="form-control" placeholder="Filtrar por descripción" value="<?= isset($filters['descripcion']) ? esc($filters['descripcion']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="contacto" class="form-control" placeholder="Filtrar por contacto" value="<?= isset($filters['contacto']) ? esc($filters['contacto']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="festival_id" class="form-control" placeholder="Filtrar por festival_id" value="<?= isset($filters['festival_id']) ? esc($filters['festival_id']) : '' ?>">
            </div>
            <div class="col">
                <input type="text" name="created_at" class="form-control" placeholder="Filtrar por fecha de creación" value="<?= isset($filters['created_at']) ? esc($filters['created_at']) : '' ?>">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

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
                <?php foreach ($patrocinadores as $patrocinador): ?>
                    <tr>
                        <td><?= esc($patrocinador['id']) ?></td>
                        <td><?= esc($patrocinador['nombre']) ?></td>
                        <td><?= esc($patrocinador['descripcion']) ?></td>
                        <td><?= esc($patrocinador['contacto']) ?></td>
                        <td><?= esc($patrocinador['festival_id']) ?></td>
                        <td><?= isset($patrocinador['fecha_creacion']) ? esc($patrocinador['fecha_creacion']) : 'N/A' ?></td>
                        <td>
                            <a href="<?= base_url('patrocinadores/save/' . $patrocinador['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('patrocinadores/delete/' . esc($patrocinador['id'])) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Patrocinador?');">Eliminar</a>
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
        <p class="text-center">No hay patrocinadores registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>


