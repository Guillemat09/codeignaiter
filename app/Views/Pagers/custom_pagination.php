<?php if ($pager): ?>
    <nav aria-label="Paginación">
        <ul class="pagination justify-content-center">
            <!-- Enlace a la primera página -->
            <?php if ($pager->hasPreviousPage()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="Primera">
                        <span aria-hidden="true">&laquo;&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Enlaces a las páginas -->
            <?php foreach ($pager->links() as $link): ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <!-- Enlace a la última página -->
            <?php if ($pager->hasNextPage()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Última">
                        <span aria-hidden="true">&raquo;&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>

