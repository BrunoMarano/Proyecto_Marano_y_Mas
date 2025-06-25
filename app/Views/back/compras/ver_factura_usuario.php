<?php if(empty($ventas)) { ?>
    <div class="container" style="margin-bottom: 50%">
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee compras registradas</h4>
            <p>Para realizar una compra visite nuestro catalogo.</p>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('todos_p') ?>">Catalogo</a>
        </div>
    </div>
    <?php } else{ ?>
        <div class="container" style="margin-bottom: 21%">
            <div class="table-responsive-sm text-center">
                <h1 class="text-center" style="margin-bottom: 3%;margin-top: 1%">Mis compras</h1>
                <table class="table table-warning table-striped rounded">
                    <thead class="thead-dark">
                        <th>Nombre cliente</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Venta_id</th>
                        <th>Opcion</th>
                    </thead>
                    <tbody>
                        <?php if(!empty($ventas) && is_array($ventas)) {
                            foreach ($ventas as $row) { ?>
                                <tr>
                                    <td><?= $row['nombre'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['usuario'] ?></td>
                                    <td><?= $row['total_venta'] ?></td>
                                    <td><?= $row['fecha'] ?></td>
                                    <td><?= $row['id'] ?></td>
                                    <td> <a href="<?php echo base_url('vista_compras/' . $row['id']) ?>" class="btn btn-success btn-sm">Ver Detalle</a></td>
                                </th>
                                <?php }
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>