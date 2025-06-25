<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('enviar') ?>">

    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" placeholder="nombre">
        <?php if($validation->getError('nombre')): ?>
            <div class='alert alert-danger mt-2'>
                <?= $validation->getError('nombre'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Repetí el mismo patrón para los demás campos -->

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input name="apellido" type="text" class="form-control" placeholder="apellido">
        <?php if($validation->getError('apellido')): ?>
            <div class='alert alert-danger mt-2'>
                <?= $validation->getError('apellido'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" placeholder="correo@algo.com">
        <?php if($validation->getError('email')): ?>
            <div class='alert alert-danger mt-2'>
                <?= $validation->getError('email'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input name="usuario" type="text" class="form-control" placeholder="usuario">
        <?php if($validation->getError('usuario')): ?>
            <div class='alert alert-danger mt-2'>
                <?= $validation->getError('usuario'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="pass" type="text" class="form-control" placeholder="password">
        <?php if($validation->getError('pass')): ?>
            <div class='alert alert-danger mt-2'>
                <?= $validation->getError('pass'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-12 text-center">
        <input type="submit" value="guardar" class="btn btn-success">
        <input type="reset" value="cancelar" class="btn btn-danger">
        <a href="<?php echo base_url('users-list')?>" class="btn btn-secondary">Volver</a>
    </div>
</form>