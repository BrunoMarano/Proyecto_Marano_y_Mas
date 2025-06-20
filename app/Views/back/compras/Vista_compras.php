<?php
$session = session();
if (empty($venta)) { ?>
    <div class="container">
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee compras registradas</h4>
            <p>Para realizar una compra visite nuestro catálogo.</p>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('catalogo') ?>">Catálogo</a>
        </div>
    </div>
<?php } ?>

<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= session()->getFlashdata('mensaje') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
<?php endif; ?>

<?php if (!empty($venta) && is_array($venta)) { ?>
    <div class="row">
        <div class="container">
            <div class="col-xl-12 col-xs-10">
                <table class="table table-secondary table-responsive table-bordered table-striped rounded">
                    <thead>
                        <tr class="text-center">
                            <th>Nº ORDEN</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>IMAGEN</th>
                            <th>CANTIDAD</th>
                            <th>COSTO</th>
                            <th>COSTO SUB-TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        foreach ($venta as $row) {
                            $imagen = $row['imagen'];
                            $i++;
                            $subtotal = $row['precio'] * $row['cantidad'];
                        ?>
                            <tr class="text-center">
                                <th><?= $i ?></th>
                                <td><?= esc($row['nombre']) ?></td>
                                <td><img width="100" height="65" src="<?= base_url('assets/uploads/' . $imagen) ?>" alt="Imagen producto"></td>
                                <td><?= number_format($row['cantidad']) ?></td>
                                <td><?= number_format($row['precio'], 2) ?></td>
                                <td>$<?= number_format($subtotal, 2) ?></td>
                            </tr>
                        <?php
                            $total += $subtotal;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                <h4>Total</h4>
                            </td>
                            <td class="text-right">
                                <h4>$<?= number_format($total, 2) ?></h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xs-12 text-center">
            <p class="h5 text-warning">Gracias por su compra</p>
        </div>
    </div>
<?php } ?>
