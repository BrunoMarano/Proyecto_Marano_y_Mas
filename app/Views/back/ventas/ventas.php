<?php
$session = session();
?>

<?php if (empty($venta)) : ?>
    <div class="container">
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee ventas registradas</h4>
            <p>Para realizar una compra visite el catálogo.</p>
            <hr>
            <a class="btn btn-warning my-2 w-100" href="<?= base_url('catalogo') ?>">Catálogo</a>
        </div>
    </div>
<?php else : ?>
    <div class="row container-fluid">
        <div class="table-responsive-sm text-center">
            <h1 class="text-center">DETALLE DE VENTAS</h1>
            <table class="table table-secondary table-striped rounded" id="users-list">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>N° ORDEN</th>
                        <th>Usuario</th>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $total = 0;

                    foreach ($venta as $row) {
                        $i++;
                        $subtotal = $row['precio'] * $row['cantidad'];
                        $total += $subtotal;
                        $imagen = $row['imagen'];
                        
                    ?>
                    
                        <tr class="text-center">
                            <th><?= $i ?></th>
                            <td><?= esc($row['usuario']) ?></td>
                            <td><?= isset($row['imagen']) ? esc($row['nombre']) : esc($row['usuario']) ?></td>
                            <td>
                                <img width="100" height="55" src="<?= base_url('assets/uploads/' . $imagen) ?>" alt="Producto">
                            </td>
                            <td><?= number_format($row["cantidad"], 0) ?></td>
                            <td>$<?= number_format($row['precio'], 2) ?></td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-end">
                            <h4>Total de ventas</h4>
                        </td>
                        <td class="text-start">
                            <h4>$<?= number_format($total, 2) ?></h4>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endif; ?>

<!-- DataTables scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-list').DataTable();
    });
</script>
