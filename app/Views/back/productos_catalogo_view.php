<div class="container colorF">
    <div class="row">
        <div class="col-md-1"></div>

        <div class="col">

            <div class="row">
                <div class="col-md-12">

                    <?php if (!$productos) { ?>
                        <div class="container-fluid">
                            <div class="well">
                                <h2 class="text-center tit">No hay Productos</h2>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div class="container-fluid mt-2 mb-3">
                            <h2 class="text-center tit">Todos los Productos</h2>
                        </div>

                        <div class="row">
                            <?php foreach ($productos as $prod): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="<?= base_url('assets/uploads/' . esc($prod['imagen'])) ?>" class="card-img-top" alt="<?= esc($prod['nombre']) ?>" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($prod['nombre']) ?></h5>
                                            <p class="card-text">$ <?= number_format($prod['precio'], 2) ?></p>
                                            
                                            <form action="<?= base_url('carrito_add') ?>" method="post">
                                                <input type="hidden" name="id" value="<?= esc($prod['id']) ?>">
                                                <input type="hidden" name="nombre" value="<?= esc($prod['nombre']) ?>">
                                                <input type="hidden" name="precio" value="<?= esc($prod['precio']) ?>">
                                                <input type="hidden" name="imagen" value="<?= esc($prod['imagen']) ?>">
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="fa fa-cart-plus"></i> Agregar al carrito
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>
