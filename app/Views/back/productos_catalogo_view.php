<div class="container colorF">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col">

            <?php if (empty($productos)) : ?>
                <div class="alert alert-warning text-center mt-4">
                    <h4>No hay Productos</h4>
                </div>
            <?php else: ?>

                <div class="text-center my-3">
                    <h2 class="tit">Todos los Productos</h2>
                </div>

                <div class="row">
                    <?php foreach ($productos as $prod) : ?>
                        <?php 
                            $estaEliminado = (isset($prod['eliminado']) && strtoupper($prod['eliminado']) === 'SI');
                            $cardClass = $estaEliminado ? 'border-danger' : '';
                            $badge = $estaEliminado ? '<span class="badge bg-danger">No disponible</span>' : '';
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 <?= $cardClass ?>">
                                <img src="<?= base_url('assets/uploads/' . esc($prod['imagen'])) ?>" 
                                     class="card-img-top" alt="<?= esc($prod['nombre']) ?>" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <?= esc($prod['nombre']) ?> <?= $badge ?>
                                    </h5>
                                    <p class="card-text">$ <?= number_format($prod['precio'], 2) ?></p>

                                    <?php if (!$estaEliminado): ?>
                                        <form action="<?= base_url('carrito_add') ?>" method="post" class="mt-auto">
                                            <input type="hidden" name="id" value="<?= esc($prod['id']) ?>">
                                            <input type="hidden" name="nombre" value="<?= esc($prod['nombre']) ?>">
                                            <input type="hidden" name="precio" value="<?= esc($prod['precio']) ?>">
                                            <input type="hidden" name="imagen" value="<?= esc($prod['imagen']) ?>">
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="fa fa-cart-plus"></i> Agregar al carrito
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <div class="alert alert-danger mt-auto text-center py-2">
                                            No disponible
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>
