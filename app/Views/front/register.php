<div class="saludo">
    <h2>Crea tu cuenta</h2>
</div>
<div class="login">
<form>
    <div class="formulario">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingresa un email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ingresa una contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
    <div id="emailHelp" class="form-text">Nunca compartas tu contraseña</div>
  </div>
  
</div>
  <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('Error');?>">Registrarse</a></button>
</form>
</div>
<div class="div-register">
    <p>¿Ya tienes cuenta?</p>
<button type="submit" class="btn-regis"><a class="a-register" href="<?php echo base_url('Login');?>">Inicia sesión</a></button>
</div>
