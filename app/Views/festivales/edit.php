<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Festival</h3>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/festivales/update/'.$festival['id']) ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($festival['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?= esc($festival['fecha_inicio']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= esc($festival['fecha_fin']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="ubicación" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicación" name="ubicación" value="<?= esc($festival['ubicación']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripción" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripción" name="descripción" rows="3"><?= esc($festival['descripción']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
