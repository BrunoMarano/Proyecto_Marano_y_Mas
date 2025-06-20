<div class="saludo">
    <h2>Hola de nuevo</h2>
</div>

<div class="login" style= "height: 65%" >
  <!-- Mostrar mensaje -->
  <?php 
    $msg = session()->getFlashdata('msg'); 
    if ($msg): 
    ?>
    <div class="alert alert-info">
      <?= is_array($msg) ? implode('<br>', array_map('esc', $msg)) : esc($msg); ?>
    </div>
  <?php endif; ?>



  <form method="post" action="<?php echo base_url('enviarlogin') ?>">
    <?= csrf_field(); ?>
  
    <div class="formulario" style="padding-bottom: 5%">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
        <div id="emailHelp" class="form-text">Nunca compartas tu contraseña</div>
      </div>

    </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Iniciar Sesion</button>
  </form>
</div>
<div class="div-register">
<button type="submit" class="btn-regis"><a class="btn-regis" href="<?php echo base_url('register'); ?>">Registrarse</a></button>
</div>