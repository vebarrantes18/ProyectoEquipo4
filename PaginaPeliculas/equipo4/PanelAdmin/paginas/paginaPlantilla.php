<?php 
session_start();

$varSession=$_SESSION['email'];
if($varSession==null  ||  $varSession=''){
   echo 'Usted no tiene autorizacion';
   die();
}
$ID_Pelicula=$_GET['verpelicula'];
print_r($ID_Pelicula);
include('db.php');
$consulta="SELECT Titulo,Año,Sinopsis,Categoria,Imagen,Trailer,Enlace_Película FROM peliculas where ID_Pelicula='$ID_Pelicula'" ;
$resultado=mysqli_query($conexion,$consulta);
$row1=mysqli_fetch_array($resultado);
?>
<html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width', initial-'scale=1.0'>
            <link rel='stylesheet' href='estilos/estilos.css'>
          
            <script src='https://kit.fontawesome.com/2c36e9b7b1.js'></script>

            <title>WatchMe</title>
    
        </head>
        <body class='header'>
    
        <header class='info'>
          <h1>Titulo: <?php echo $row1['Titulo']?></h1>
          <h2>Año: <?php echo $row1['Año']?></h2>
          <h2>Categoria: <?php echo $row1['Categoria']?></h2>
          <div class="contenedor1">
          <button role='button' class='boton'> <i class='fas fa-play'></i><a style='text-decoration: none;' href='<?php echo $row1['Enlace_Película']?>' >Reproducir</button>
          <button role='button' class='boton'> <i class='fas fa-info-play'></i><a style='text-decoration: none;' href='<?php echo $row1['Enlace_Película']?>'>Trailer</button>
          </div>
        </header>
        
    
        <main>
    
              <div class='contenedor'>
    
              <img src='/PaginaPeliculas/equipo4/PanelAdmin/imagenes/<?php echo $row1['Imagen']?>' width='400' height='500' title='DRAGON BALL SUPER HERO'>
    
              <div class='text'>
    
              <p>Sinopsis: <?php echo $row1['Sinopsis']?>
              </p>
              
    
            <button class='iconos'><i class='fa fa-heart' title='Me gusta'></i></button>
            <button class='iconos1'><i class='fa fa-download' title='Descargar'></i></button>
            <button class='iconos2'><i class='fa fa-thumbs-down' title='No me gusta'></i></button>
            
    
            </div>
            
          </div>
          
        </main>
        
        
            <script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
            <script src='js/main.js'></script>
            
        </body>
    </html>