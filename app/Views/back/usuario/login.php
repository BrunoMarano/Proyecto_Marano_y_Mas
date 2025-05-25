<div class="saludo">
    <h2>Hola de nuevo</h2>
</div>
<div class="login">
  <form method="post" action="<?php echo base_url('usuario/login') ?>">
    <?= csrf_field(); ?>
  
  <form>
    <div class="formulario">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
        <div id="emailHelp" class="form-text">Nunca compartas tu contraseña</div>
      </div>
      
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
  </form>
</div>
<div class="div-register">
<button type="submit" class="btn-regis"><a class="a-register" href="<?php echo base_url('Register');?>">Registrarse</a></button>
</div>
