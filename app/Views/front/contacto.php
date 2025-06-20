<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>


<!-- Titulo inicial -->
<div class="contactanos">
        <h4>Contactanos</h4>
</div>

<!-- Formulario de contacto-->
<div class="contacto-general">
<form class="form-contacto" method="post" action="<?= base_url('guardar-consulta'); ?>">
    <!-- Formulario de nombre completo -->
    <div class="row-mb-3-contacto">
      <label for="inputEmail3" class="col-sm-2-col-form-label-contacto">Nombre completo</label>
      <div>
        <input type="text" name="nombre" class="form-control-contacto" placeholder="Tu nombre completo">
      </div>
    </div>

    <!-- Formulario de correo electronico -->
    <div class="row-mb-3-contacto">
      <label for="inputEmail3" class="col-sm-2-col-form-label-contacto">Correo electrónico</label>
        <div class="col-sm-10-contacto">
          <input type="email" name="email" class="form-control-contacto" placeholder="Tu correo electrónico">
        </div>
    </div>

    <!-- Formulario de telefono de contacto -->
    <div class="row-mb-3-contacto">
      <label for="inputEmail3" class="col-sm-2-col-form-label-contacto">Teléfono de contacto</label>
        <div class="col-sm-10-contacto">
          <input type="tel" class="form-control-contacto" name="telefono" id="telefono" pattern="[0-9]+" title="Solo se permiten números" required placeholder="Tu número de teléfono">
        </div>
    </div>

    <!-- Formulario de motivo -->
    <div class="row-mb-3-contacto">
      <label for="inputEmail3" class="col-sm-2-col-form-label-contacto">Motivo</label>
      <!-- <textarea id="mensaje" class="form-control-contacto-textMotivo"></textarea> -->
        <div class="col-sm-10-contacto">
          <textarea name="mensaje" class="form-control-contacto-motivo" placeholder="Escribí tu mensaje..."></textarea>
        </div>
      </div>

    <!-- Boton de enviar mensaje -->
    <button type="submit" class="btn-btn-primary-contacto">Enviar mensaje</button>
    <button type="reset" class="btn-btn-primary-contacto">Limpiar</button>
</form>

<!-- Datos de contacto  -->
<div class="datos">
    <h6>Lineas de contacto: </h6>
    <img src="assets\img\Contactos\llamada-telefonica.png" class="img-contactos">&nbsp;<a href="Tel:3794167832">379-4167832</a> </img> 
    <br><img src="assets\img\Contactos\sobre.png" class="img-contactos">&nbsp;<a> contacto@avicolasantaana.com</a> </img>
    <br><img src="assets\img\Contactos\marcador.png" class="img-contactos"><a href="<?php echo base_url('Sucursales');?>">Sucursales:</a> </img>
</div>
</div>