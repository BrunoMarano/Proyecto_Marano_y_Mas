<div class="container m-4">


    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-2" >
        <a href="<?= base_url('produ-form') ?>" class="btn btn-success">Agregar producto</a>
    </div>

    <table class="table table-bordered table-hover table-striped" style="margin-bottom: 30%; text-align: center;">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Costo</th>
                <th>Precio de venta</th>
                <th>Stock</th>
                <th>Stock mínimo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($productos)): ?>
                <?php foreach($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['id']) ?></td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['categoria_id']) ?></td>
                        <td>$<?= number_format(esc($producto['costo']), 2) ?></td>
                        <td>$<?= number_format(esc($producto['precio']), 2) ?></td>
                        <td><?= esc($producto['stock']) ?></td>
                        <td><?= esc($producto['stock_min']) ?></td>
                        <td>
                            <?php if(!empty($producto['imagen'])): ?>
                                <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" alt="Imagen producto" width="60" />
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('editar/' . $producto['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="<?= base_url('borrar/' . $producto['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que querés eliminar este producto?');">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No hay productos para mostrar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
