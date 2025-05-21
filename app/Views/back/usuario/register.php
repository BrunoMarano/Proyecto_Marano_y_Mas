<div class="saludo">
    <h2>Crea tu cuenta</h2>
</div>
<div class="login">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?= base_url('/enviar-form') ?>">
  <?= csrf_field(); ?>

  <?php if (session()->getFlashdata('fail')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
  <?php endif ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
  <?php endif ?>

  <div class="formulario">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
      <?= $validation->getError('nombre') ? "<div class='alert alert-danger'>{$validation->getError('nombre')}</div>" : '' ?>
    </div>

    <div class="mb-3">
      <label for="apellido" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" value="<?= set_value('apellido') ?>">
      <?= $validation->getError('apellido') ? "<div class='alert alert-danger'>{$validation->getError('apellido')}</div>" : '' ?>
    </div>

    <div class="mb-3">
      <label for="usuario" class="form-label">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" value="<?= set_value('usuario') ?>">
      <?= $validation->getError('usuario') ? "<div class='alert alert-danger'>{$validation->getError('usuario')}</div>" : '' ?>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Correo electrónico</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
      <?= $validation->getError('email') ? "<div class='alert alert-danger'>{$validation->getError('email')}</div>" : '' ?>
    </div>

    <div class="mb-3">
      <label for="pass" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="pass" name="pass">
      <?= $validation->getError('pass') ? "<div class='alert alert-danger'>{$validation->getError('pass')}</div>" : '' ?>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
</div>
