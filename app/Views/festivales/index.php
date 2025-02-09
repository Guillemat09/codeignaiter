<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Festivales</h3>
        <div class="card-toolbar">
            <a href="<?= base_url('/festivales/create') ?>" class="btn btn-primary">Añadir Festival</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($festivales as $festival): ?>
                <tr>
                    <td><?= esc($festival['nombre']) ?></td>
                    <td><?= esc($festival['fecha_inicio']) ?></td>
                    <td><?= esc($festival['fecha_fin']) ?></td>
                    <td><?= esc($festival['ubicación']) ?></td>
                    <td>
                        <a href="<?= base_url('/festivales/edit/'.$festival['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('/festivales/delete/'.$festival['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este festival?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
