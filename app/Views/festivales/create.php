<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Añadir Festival</h3>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/festivales/store') ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
            </div>
            <div class="mb-3">
                <label for="ubicación" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicación" name="ubicación" required>
            </div>
            <div class="mb-3">
                <label for="descripción" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripción" name="descripción" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
