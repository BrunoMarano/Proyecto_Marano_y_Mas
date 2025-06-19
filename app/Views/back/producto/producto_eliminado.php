<div class="container mt-4">
    <h2 class="text-center mb-4">Productos Eliminados</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($producto)): ?>
                <?php foreach ($producto as $prod): ?>
                    <?php if ($prod['eliminado'] == 'SI'): ?>
                        <tr>
                            <td><?= esc($prod['id']) ?></td>
                            <td><?= esc($prod['nombre']) ?></td>
                            <td><?= esc($prod['categoria_id']) ?></td>
                            <td>$<?= number_format($prod['precio'], 2) ?></td>
                            <td>
                                <img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" width="60" height="60" alt="img">
                            </td>
                            <td>
                                <a href="<?= base_url('activar_pro/' . $prod['id']) ?>" class="btn btn-success btn-sm">Activar</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay productos eliminados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mt-3">
        <a href="<?= base_url('crud_productos') ?>" class="btn btn-secondary">Volver</a>
    </div>
</div>

