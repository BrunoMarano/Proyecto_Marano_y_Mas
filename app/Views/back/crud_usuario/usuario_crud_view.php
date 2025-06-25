<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?= base_url('enviar') ?>" style="background-color: #000; color: #fff; padding: 20px; border-radius: 10px;">
    <?= csrf_field() ?>

    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div style="background-color: #ffdd57; color: #000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <?= session()->getFlashdata('fail'); ?>
        </div>
    <?php endif ?>

    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div style="background-color: #ffffcc; color: #000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif ?>

    <div class="mb-3">
        <label class="form-label" style="color: #fff;">Nombre</label>
        <input name="nombre" type="text" class="form-control" placeholder="nombre" value="<?= set_value('nombre') ?>" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
        <?php if($validation->getError('nombre')): ?>
            <div style="color: #ffdd57; margin-top: 5px; font-weight: 600;">
                <?= $validation->getError('nombre'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label" style="color: #fff;">Apellido</label>
        <input name="apellido" type="text" class="form-control" placeholder="apellido" value="<?= set_value('apellido') ?>" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
        <?php if($validation->getError('apellido')): ?>
            <div style="color: #ffdd57; margin-top: 5px; font-weight: 600;">
                <?= $validation->getError('apellido'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label" style="color: #fff;">Email</label>
        <input name="email" type="email" class="form-control" placeholder="correo@algo.com" value="<?= set_value('email') ?>" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
        <?php if($validation->getError('email')): ?>
            <div style="color: #ffdd57; margin-top: 5px; font-weight: 600;">
                <?= $validation->getError('email'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label" style="color: #fff;">Usuario</label>
        <input name="usuario" type="text" class="form-control" placeholder="usuario" value="<?= set_value('usuario') ?>" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
        <?php if($validation->getError('usuario')): ?>
            <div style="color: #ffdd57; margin-top: 5px; font-weight: 600;">
                <?= $validation->getError('usuario'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label" style="color: #fff;">Password</label>
        <input name="pass" type="password" class="form-control" placeholder="password" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
        <?php if($validation->getError('pass')): ?>
            <div style="color: #ffdd57; margin-top: 5px; font-weight: 600;">
                <?= $validation->getError('pass'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-12 d-flex justify-content-center gap-2 mt-3">
        <input type="submit" value="Guardar" style="background-color: #ffdd57; color: #000; border: 1px solid #000; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
        <input type="reset" value="Cancelar" style="background-color: #fff; color: #000; border: 1px solid #000; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
        <a href="<?= base_url('users-list') ?>" style="background-color: #fff; color: #000; border: 1px solid #000; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; text-align: center;">Volver</a>
    </div>
</form>
