<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">

<div>
<nav class="navbar">
  <button class="menu-toggle" onclick="toggleMenu()">&#9776;</button>
  <ul class="menu-p">
    <li><a href="<?= base_url('/') ?>"><img class="nav_logo" src="<?= base_url('assets/img/principal/logoAvicola/logoAvicola.png') ?>" alt="Logo"></a></li>
    
    <?php if ($session->get('logged_in')): ?>

      <?php if($perfil == 1): ?>
        <li><a class="nav-opciones" href="<?php echo base_url("/");?>">Inicio</a></li>
        <li><a class="nav-opciones" href="<?= base_url('crud_usuario') ?>">Crud de Usuario</a></li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="crudDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CRUD productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="crudDropdown">
            <li><a class="dropdown-item" href="<?= base_url('altaProducto'); ?>">Cargar producto</a></li>
            <li><a class="dropdown-item" href="<?= base_url('altaProducto'); ?>">Modificar producto</a></li>
            <li><a class="dropdown-item" href="<?= base_url('altaProducto'); ?>">Eliminar producto</a></li>
          </ul>
        </li>
        <li class="nav-opciones"><a class="nav-link" href="<?php echo base_url('ventas');?>" taindex="-1" aria-disatabled="true">Muestra ventas</a></li>
        <li class="nav-opciones"><a class="nav-link" href="<?php echo base_url('listar-consultas');?>" tabindex="-1" aria-disatabled="true">Consultas</a></li>        
      </li>
      <?php elseif ($perfil == 2): ?>
        <li><a class="nav-opciones" href="<?= base_url('/') ?>">Inicio</a></li>
        <li><a class="nav-opciones" href="<?= base_url('catalogo') ?>">Catalogo</a></li>
        <li><a class="nav-opciones" href="<?= base_url('carrito') ?>">Carrito</a></li>
        <li><div class="nav-barrita"></div></li>
        <li><a class="nav-opciones-mp" href="<?= base_url('') ?>">Mis Compras</a></li>
      <?php endif; ?>
    <?php else: ?>
      <li><a class="nav-opciones" href="<?= base_url('/') ?>">Inicio</a></li>
      <li><a class="nav-opciones" href="<?= base_url('Nosotros') ?>">Nosotros</a></li>
      <li><a class="nav-opciones" href="<?= base_url('Productos') ?>">Productos</a></li>
      <li><a class="nav-opciones" href="<?= base_url('Contacto') ?>">Contacto</a></li>
      <li><a class="nav-opciones-mp" href="<?= base_url('Metodos de Pagos') ?>">Metodos de pagos</a></li>
      <li><a class="nav-opciones-sucursal" href="<?= base_url('Sucursales') ?>">Sucursales</a></li>
    <?php endif; ?>
  </ul>

  <ul class="busqueda">
    <li class="ig">
      <a href="https://www.instagram.com/avicolasantaana">
        <img class="imagen_ig" src="<?= base_url('assets/img/principal/redes/logoIG.png') ?>" alt="logo_ig">
      </a>
    </li>

    <?php if ($session->get('logged_in')): ?>
      <li class="nav-user">
        <span class="a-logiv-nav">Bienvenido, <?= esc($nombre) ?></span>
      </li>
      <li class="nav-login"><a class="a-login-nav" href="<?= base_url('logout') ?>">Cerrar sesión</a></li>
    <?php else: ?>
      <li class="nav-login"><a class="a-login-nav" href="<?= base_url('login') ?>">Iniciar sesión</a></li>
    <?php endif; ?>

    <li class="carrito">
      <a href="#">
        <img class="imagen_ig" src="<?= base_url('assets/img/principal/redes/carrito-de-compras.png') ?>" alt="carrito">
      </a>
    </li>
    <li class="nav-login"><a class="a-login-nav" href="<?= base_url('carrito') ?>">Carrito</a></li>
    
    <li>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </li>
  </ul> 
</nav>
</div>

<script>
  function toggleMenu() {
    document.querySelector('.menu-p').classList.toggle('show');
    document.querySelector('.busqueda').classList.toggle('show');
    toggle.addEventListener('click', () => {
      menu.classList.toggle('open');
    });
  }

  document.addEventListener('click', (e) => {
    if (!dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.remove('open');
    }
  });
</script>
