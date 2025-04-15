
  <!-- <nav class="navbar">
    <ul class= menu-p>
      <li> <a href= "<?php echo base_url("/");?>" ><img class = nav_logo src="assets/img/principal/logoAvicola/logoAvicola.png" alt="Logo">
      <li> <a class="nav-opciones"  href="<?php echo base_url("/");?>">Inicio</a>
      <li> <a class="nav-opciones"  href="<?php echo base_url('Nosotros');?>">Nosotros </a></li>
      <li> <a class="nav-opciones"  href="<?php echo base_url('Productos');?>">Productos</a></li>
      <li> <a class="nav-opciones"  href="<?php echo base_url('Promociones');?>">Promociones</a></li>
      <li> <a class="nav-barrita"></a>
      <li> <a class="nav-opciones-mp"  href="<?php echo base_url('Metodos de Pagos');?>">Metodos de pagos</a></li>
      <li> <a class="nav-opciones-sucursal"  href="<?php echo base_url('Sucursales');?>">Sucuarsales</a></li>
    </ul>
    <ul class= "busqueda">
      <li class="ig"> <a href="https://www.instagram.com/avicolasantaana"><img class = imagen_ig src="assets/img/principal/redes/logoIG.png"  alt="logo_ig" ></a></li>
      <form class="d-flex" role="search">
        <input class="busqueda input" type="search" placeholder="Search" aria-label="Search">
        <button class="busqueda button" type="submit">Search</button>
      </form>
</ul>
  </nav>






<div class= "barraNegra">
 Esto es una barra negra -->
<!-- </div> -->


<link rel="stylesheet" href="styles.css">

<nav class="navbar">
  <button class="menu-toggle" onclick="toggleMenu()">&#9776;</button>
  <ul class="menu-p">
    <li><a href="<?php echo base_url("/");?>"><img class="nav_logo" src="assets/img/principal/logoAvicola/logoAvicola.png" alt="Logo"></a></li>
    <li><a class="nav-opciones" href="<?php echo base_url("/");?>">Inicio</a></li>
    <li><a class="nav-opciones" href="<?php echo base_url('Nosotros');?>">Nosotros</a></li>
    <li><a class="nav-opciones" href="<?php echo base_url('Productos');?>">Productos</a></li>
    <li><a class="nav-opciones" href="<?php echo base_url('Promociones');?>">Promociones</a></li>
    <li><div class="nav-barrita"></div></li>
    <li><a class="nav-opciones-mp" href="<?php echo base_url('Metodos de Pagos');?>">Metodos de pagos</a></li>
    <li><a class="nav-opciones-sucursal" href="<?php echo base_url('Sucursales');?>">Sucursales</a></li>
  </ul>

  <ul class="busqueda">
    <li class="ig"><a href="https://www.instagram.com/avicolasantaana"><img class="imagen_ig" src="assets/img/principal/redes/logoIG.png" alt="logo_ig"></a></li>
    <li>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </li>
  </ul>
</nav>

<script>
  function toggleMenu() {
    document.querySelector('.menu-p').classList.toggle('show');
    document.querySelector('.busqueda').classList.toggle('show');
    toggle.addEventListener('click', () => {
      menu.classList.toggle('open');
  })
}
document.addEventListener('click', (e) => {
            if (!dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('open');
            }
        });
</script>

<div class= "barraNegra">
 <!-- Esto es una barra negra  -->
 </div> 