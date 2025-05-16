<div class="saludo">
    <h2>Crea tu cuenta</h2>
</div>
<div class="login">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('\enviar-form') ?>">
  <?=csrf_field();?>
  <?php if(!empty (session()->getFlashdata('Fail'))):?>
  <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
  <?php endif?>
  <?php if(!empty (session()->getFlashdata('success'))):?>
    <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
    <?php endif?>

  <div class="formulario">
    <div class=" mb-3">
      <label for="exampleInputEmail1" class="form-label">Ingrese su nombre</label>
      <input class="form-control" id="exampleInputEmail1">
      <?php if($validation->getError('nombre')) {?>
        <div class='alert alert-danger mt_2'>
          <?= $error= $validation->getError('nombre'); ?>
      </div>
      <?php }?>
    </div>

    <div class=" mb-3">
      <label for="exampleInputApellido1" class="form-label">Ingrese su apellido</label>
      <input class="form-control" id="exampleInputEmail1">
      <?php if($validation->getError('apellido')) {?>
        <div class='alert alert-danger mt_2'>
          <?= $error= $validation->getError('apellido'); ?>
      </div>
      <?php }?>
    </div>

    <div class=" mb-3">
      <label for="exampleInputEmail1" class="form-label">Ingrese su mail</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <?php if($validation->getError('mail')) {?>
        <div class='alert alert-danger mt_2'>
          <?= $error= $validation->getError('mail'); ?>
      </div>
      <?php }?>
    </div>

    <div class=" mb-3">
      <label for="exampleInputUsuario1" class="form-label">Ingrese su usuario</label>
      <input class="form-control" id="exampleInputUsuario1">
      <?php if($validation->getError('usuario')) {?>
        <div class='alert alert-danger mt_2'>
          <?= $error= $validation->getError('usuario'); ?>
      </div>
      <?php }?>
    </div>

    <div class=" mb-3">
      <label for="exampleInputEmail1" class="form-label">Ingrese su contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
      <?php if($validation->getError('pass')) {?>
        <div class='alert alert-danger mt_2'>
          <?= $error= $validation->getError('pass'); ?>
      </div>
      <?php }?>
    </div>
  
</div>
  <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('Error');?>">Registrarse</a></button>
</form>
</div>
<div class="div-register">
    <p>¿Ya tienes cuenta?</p>
<button type="submit" class="btn-regis"><a class="a-register" href="<?php echo base_url('Login');?>">Inicia sesión</a></button>
</div>
