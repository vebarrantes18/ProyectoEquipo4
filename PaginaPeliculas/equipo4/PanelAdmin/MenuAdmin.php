<?php 
//Verifiacion de Credenciales de administrador
include ('Conexiondb.php');
session_start();
error_reporting(0);
$varSession1=$_SESSION['email'];
if($varSession1==null  ||  $varSession1==''){
   echo 'Usted no tiene autorizacion ';
   die();
}
else{
$consulta0="SELECT Estatus FROM usuarios WHERE Correo='$varSession1' ";
$resultado0=mysqli_query($conexion,$consulta0);
$row1=mysqli_fetch_array($resultado0);
$estatus=$row1['Estatus'];
if($estatus!=2){
    echo "Usted no tiene autorizacion, Esta seccion es solo para administradores:  " .  $varSession1;
   die();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesMenuAdmin.css">
</head>
<body class="">
    <div class="Content abs-center">
        <div class="Contenedor  form ">
            <h1 class="Titulo">Panel Audiovisual Administrador</h1>
            <h2  class="Titulo">Bienvenido <?php echo $_SESSION['email']?></h2>
            <form id="Frmglobal" action="SubirPelis.php" class="row g-3  w-100 p-3" method="post" enctype="multipart/form-data">
                <div class="col-md-6 w-100">
                    <label for="inputState" class="form-label">Que desea realizar?</label>
                    <select id="Accion" class="form-select">
                      <option value="opcion0" >...</option>
                      <option value="opcion1" >Agregar Una Nueva Pelicula</option>
                      <option value="opcion2" >Modificar Una Pelicula Existente</option>
                      <option value="opcion3">Eliminar Una Pelicula Existente</option>
                    </select>
                  </div>
                  <P></P>
                  <div class="TarjetaAjax">
                  <div class="row">
                    <div class="col titulo1">
                      
                        <label for="inputEmail4" class="form-label">Nombre de la pelicula</label>
                      <input id="NombrePelicula" type="text" class=" form-control" placeholder="Nombre" aria-label="First name" name="txtNombre">
                      <button  id="btnBuscar" type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg> </button>
                       
                    </div>
                    <div class="col hideinp" >
                        <label for="inputEmail4" class="form-label">Año</label>
                      <input id="AñoPelicula" type="text" class="hideinp form-control" placeholder="Año" aria-label="Last name" name="txtAño">
                    </div>
                  </div>
                
                  <div class="col-md-6 w-100 hideinp">
                    <label for="inputEmail4" class="form-label ">Sinopsis</label>
                    <textarea id="Sinopsis" name="txtSinopsis" class="form-control hideinp" id="inputEmail4" cols="30" rows="10"></textarea>
                  </div>
                  

                 <div class="col-md-6 hideinp">
                 <label for="inputCity" class="form-label ">Categoria</label>
                    <select name="txtCategoria" id="categoria" class="form-select hideinp"> 
                    <option id="Opcion1">...</option>
                        <?php    
                        include('Conexiondb.php');
                        $consulta="SELECT * FROM categorias" ;
                        $resultado=mysqli_query($conexion,$consulta);

                        while($row=mysqli_fetch_array($resultado))
                        {
                         $categoria=$row['NombreCategoria'];

                         ?>
                      
                    <option id="categoria1" value="<?php echo $categoria ?> "> <?php echo $categoria ?> </option>
                    <?php 
                   }
                  ?>
                    </select>
                 </div> 
                 <div class="img1">
                 <label class='hideinp ' for="myfile">Imagen:</label>
                 <input class="hideinp" type="file" id="imagen" name="txtImagen">
                 </div>


                 <div class="col-md-6 hideinp ">
                    <label for="inputCity" class="form-label">Url del trailer</label>
                    <input id="txtTrailer1" name="txtTrailer" type="text" class="form-control hideinp" id="trailer">
                  </div>

                  <div class="col-md-6 hideinp">
                    <label for="inputCity" class="form-label">Url de la pelicula</label>
                    <input id="txtPelicula1" name="txtPelicula" type="text" class=" form-control hideinp" id="pelicula">
                  </div>

                  </div>
                <div class="col-12 btn1">
                  <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar</button>
                </div>
                <a href="/PaginaPeliculas/equipo4/PaginaPrincipal/Inicio.php" class="btn btn-warning" style="width: 15%;" >Regresar</a>
              </form>
        </div>
    </div>
    <script> </script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>