<h1>Lista de Productos</h1>
<ul>
    <?php foreach ($productos as $producto): ?>
        <li><?= $producto->nombre ?> - <?= $producto->precio ?>€</li>
    <?php endforeach; ?>
</ul>
