<div class="container-fluid" id="carrito">
    <div class="cart">
        <div class="heading">
            <h2 class="text-center" style="margin-top: 20px;">Productos en tu Carrito</h2>
        </div>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                <?= session()->getFlashdata('mensaje') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="text-center">
    <?php if (empty($cart)): ?>
       <p>Para agregar productos al carrito, vuelvo al catalogo</p>
        <a class="btn btn-warning text-dark mt-2" href="<?= base_url('/todos_p') ?>">
            <i class="fa-solid fa-circle-chevron-left"></i> Volver al catálogo
        </a>
        <img class="imagenes-footer" src="<?= base_url('assets/img/carrito/carrito_vacio.png') ?>" alt="logoX">
    <?php endif; ?>
</div>

<?php if (!empty($cart)): ?>
<form action="<?= base_url('carrito_actualiza') ?>" method="post">
    <div class="container my-3">
        <table class="table table-hover table-dark table-responsive-md"  style="margin-bottom: 47%;">
            <thead class="table-dark">
                <tr>
                    <th>IMAGEN</th>
                    <th>PRODUCTOS</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                    <th>Cancelar</th>
                </tr>
            </thead>
            <tbody>
                <?php $gran_total = 0; ?>
                <?php foreach ($cart as $item): ?>
                    <?php $gran_total += $item['price'] * $item['qty']; ?>

                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][id]" value="<?= esc($item['id']) ?>">
                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][name]" value="<?= esc($item['name']) ?>">
                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][price]" value="<?= esc($item['price']) ?>">
                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][qty]" value="<?= esc($item['qty']) ?>">
                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][imagen]" value="<?= esc($item['imagen']) ?>">

                    <tr class="table-danger align-middle">
                        <td>
                            <img src="<?= base_url('assets/uploads/' . $item['imagen']) ?>" width="80" height="80" alt="<?= esc($item['name']) ?>">
                        </td>
                        <td><?= esc($item['name']) ?></td>
                        <td>$ <?= number_format($item['price'], 2) ?></td>
                        <td>
                            <a class="btn btn-sm btn-success" href="<?= base_url('carrito_resta/' . $item['rowid']) ?>">-</a>
                            <?= number_format($item['qty']) ?>
                            <a class="btn btn-sm btn-success" href="<?= base_url('carrito_suma/' . $item['rowid']) ?>">+</a>
                            
                        </td>
                        <td>$ <?= number_format($item['price'] * $item['qty'], 2) ?></td>
                        <td>
                            <a href="<?= base_url('carrito_elimina/' . $item['rowid']) ?>">
                                <img src="<?= base_url('assets/img/carrito/basurero.png') ?>" width="80" height="80" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr class="table-light">
                    <td colspan="4"><strong>Total: $ <?= number_format($gran_total, 2) ?></strong></td>
                    <td colspan="2" class="text-end">
                        <input type="button" class="btn btn-primary btn-lg" value="Borrar Carrito" onclick="window.location='<?= base_url('borrar') ?>'">
                        <input type="button" class="btn btn-secondary btn-lg" value="Comprar" onclick="window.location='<?= base_url('carrito-comprar') ?>'">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
<?php endif; ?>
