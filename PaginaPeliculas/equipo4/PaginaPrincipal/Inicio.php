<?php 
session_start();
error_reporting(0);
$varSession=$_SESSION['email'];
if($varSession==null  ||  $varSession=''){
   echo 'Usted no tiene autorizacion';
   die();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Pagina Principal | Watch Me NOW </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    
  </head>
  <body>
  <header>
      <div class="inicio">
        <img src="img/Logowm2.png" alt="">
        <h2 class="Pagina Principal">Inicio</h2>
      </div>
      <nav>
        <a href="" class=""> <?php echo $_SESSION['email'] ?> </a>
        <a href="Cerrar_Session.php" class="">Salir</a>
      </nav>
    </header>
    <section>
      <div class="">
        <div class=" ">

        <div class="container-fluid">
    <div class="row flex-nowrap">
        <div style="background-color: white" class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal show border-end">
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                    <a href="/PaginaPeliculas/equipo4/PanelAdmin/MenuAdmin.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-bootstrap"></i> <span>Menu Admin</span> </a>
                    <a href="/PaginaPeliculas/equipo4/PaginaPrincipal/userinfo.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-film"></i> <span>Mi Perfil</span></a>
                </div>
            </div>
        </div>
        <main class="col ps-md-2 pt-2">
            <a style="background-color: white " href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg> Menu</a>
<section>
<div class="main1  ">
  <div class="PeliculaContainer " ></div>
  <div class="card-columns">
               <?php 
               include('db.php');
               $consulta="SELECT ID_Pelicula,Titulo,Año,Imagen FROM peliculas" ;
               $resultado=mysqli_query($conexion,$consulta);
               foreach($resultado as $row){ ?>
         <div class="card Tarjeta"> 
      <a href="/PaginaPeliculas/equipo4/PanelAdmin/paginas/paginaPlantilla.php?verpelicula=<?php echo $row['ID_Pelicula']?>"> <img  src="/PaginaPeliculas/equipo4/PanelAdmin/imagenes/<?php echo $row['Imagen']; ?>" class="card-img-top" alt="..."> </a>
       <div class="card-body">
      <h5 class="card-title"><strong><?php echo $row['Titulo']; ?></strong></h5>
      <h5 class="card-title"><strong><?php echo $row['Año']; ?></strong></h5>
      
    </div>
    
     
</div>
  <?php  } ?> 
</section>
        </main>
    </div>
</div>

        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
