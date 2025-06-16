<div class="container-fluid" id="carrito">
    <div class="cart">
        <div class="heading">
            <h2 class="tect-center">Procutos en tu Carrito</h2>
        </div>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                <?= session()->getFlashdata('mensaje') ?>
                <button type="button" class="btn-close" data-bs-dimiss="alert" arial-label="cerrar"></button>
            </div>
        <?php endif; ?>
    </div>
</div> 
    <div class="text-center">
        <?php if (empy($cart)): ?>
            <p>Para agregar productos al carrito, hace clic en:</p>
            <a class="btn btn-warnig text-dark mt-2" href="<?= base_url('/todos_p') ?>">
                <i class="fa-solid fa-circle-chevron-left"></i> Volver al catálogo
            </a>
        <?php endif; ?>
    </div>
</div> 
<?php if (!empty($cart)): ?>
    <form action="<?= base_url('carrito_actualiza') ?>" method="post">
        <div calss="container my-3">
            <table class="table table-hover table-dark table-responsive-md">
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
                    <?php $gran_total =0; ?>
                    <?php foreach ($cart as $item): ?>
                        <?php
                            $gran_total += $item['price'] * $item['qty'];
                            ?>
                        
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][id]" value="<?= esc($item['id']) ?>">
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][rowind]" value="<?= esc($item['rowind']) ?>">
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][rowind]" value="<?= esc($item['name']) ?>">
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][rowind]" value="<?= esc($item['price']) ?>">
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][rowind]" value="<?= esc($item['qty']) ?>">
                        <input type="hidden" name="cart[<?= esc($item['rowind']) ?>][rowind]" value="<?= esc($item['imagen']) ?>">
                        <tr clas="table-danger align-middle">
                            <td><img src="<?= base-url('assets/uploads/' . $item['imagen']) ?>" width="80"
                            heigth="80" alt="<?= esc($item['name']) ?>"></td>
                            <td><?= esc($item['name']) ?></td>
                            <td>$  <?= number_format($item['price'], 2) ?></td>
                            <td>
                                <a class="btn btn-sm btn_success" href="<?= base_url('carrito_suma/' . $item['rowind']) ?>">+</a> <?= number_format($item['qty']) ?>
                                <a class="btn btn-sm btn_success" href="<?= base_url('carrito_resta/' . $item['rowind']) ?>">-</a>
