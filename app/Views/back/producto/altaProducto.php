<div class="container mt-1 mb_1 d_flex justify-content_center">
     <div class="card" style="width:75%;">
        <div class="card-header text-center">
            <h2>Alta de Productos</h2>
        </div>

        <?php if(!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif; ?>

        <?php if(!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <?php !$validation = \Config\Services::validation(); ?>


        <!-- Inicio de formulario -->
        <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form_data">
            <div class="card-body" media="(max-width:568px)">
                <div class="mb-2">
                    <label for="nombre_prod" class="form-label">Productos</label>
                    <input class="form-control" type="text" name="nombre_prod" id="nombre_prod" value="<?= set_value('nombre_prod');?>" placeholder="Nombre del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('nombre_prod')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('nombre_prod'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Costo del producto -->
                <div class="mb-2">
                    <label for="costo" class="form-label">Costo</label>
                    <input class="form-control" type="text" name="costo" id="costo" value="<?= set_value('costo');?>" placeholder="Costo del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('costo')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('costo'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Precio de venta -->
                <div class="mb-2">
                    <label for="precio" class="form-label">Precio de venta</label>
                    <input class="form-control" type="text" name="precio" id="precio" value="<?= set_value('precio');?>" placeholder="Nombre del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('precio')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('precio'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Stock -->
                <div class="mb-2">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="text" name="stock" id="stock" value="<?= set_value('stock');?>" placeholder="Stock del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('stock')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('stock'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Stock mínimo-->
                <div class="mb-2">
                    <label for="stock_min" class="form-label">Stock Mínimo</label>
                    <input class="form-control" type="text" name="stock_min" id="stock_min" value="<?= set_value('stock_min');?>" placeholder="Stock mínimo del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('stock_min')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('stock_min'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Imagen-->
                <div class="mb-2">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="text" name="imagen" id="imagen" value="<?= set_value('imagen');?>" placeholder="imagen del producto" autofocus>
                    <!-- Error -->
                     <?php if($validation->getError('imagen')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $validation->getError('imagen'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Botones -->
                <div class="form-group">
                    <button type="submit" id="send_form" class="2btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                    <a href="<?= base_url('crear'); ?>" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>

            