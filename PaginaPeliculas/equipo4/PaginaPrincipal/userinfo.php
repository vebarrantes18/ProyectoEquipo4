<?php 
//Verifiacion de Credenciales de administrador
include ('db.php');
session_start();
error_reporting(0);
$varSession1=$_SESSION['email'];
if($varSession1==null  ||  $varSession1==''){
   echo 'Usted no tiene autorizacion ';
   die();
}
else{
$consulta0="SELECT * FROM usuarios WHERE Correo='$varSession1' ";
$resultado0=mysqli_query($conexion,$consulta0);
$row1=mysqli_fetch_array($resultado0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/PaginaPeliculas/equipo4/PanelAdmin/stylesMenuAdmin.css">
</head>
<body style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,0,78,0.7903536414565826) 0%, rgba(138,98,159,1) 100%, rgba(0,212,255,1) 100%);">
    <div class="Content abs-center">
        <div class="Contenedor  form ">
            <h1 class="Titulo">Informacion del usuario</h1>
            <h2 class="Titulo">Bienvenido <?php echo $_SESSION['email']?></h2>
            <form action="Modificarinfo.php" class="row g-3  w-100 p-3" method="post" enctype="multipart/form-data">
                <div class="col-md-6 w-100" style="text-align: center;">
                   <h2>Desea modificar su informacion?</h2>
                  </div>
                  <P></P>
                  <div class="row">
                    <div class="col">
                        <label for="inputEmail4" class="form-label">UserName:</label>
                      <input required id="Nombreusuario" value='<?php echo $row1['Usuario'] ?>' type="text" class="form-control" placeholder="Nombre" aria-label="First name" name="txtNombreUsuario">
                    </div>
                    <div class="col">
                        <label for="inputEmail4" class="form-label">Email (no se puede modificar)</label>
                      <input id="Email1" value='<?php echo $_SESSION['email'] ?>' type="text" class="form-control" placeholder="Año" aria-label="Last name" name="txtAño">
                    </div>
                  </div>

                 <div class="col-md-6">
                    <label for="inputCity" class="form-label">Contraseña Actual</label>
                    <input id="contraseñaActual" type="text" class="form-control" id="trailer" name="txtContraseñaActual">
                  </div>

                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Nueva Contraseña</label>
                    <input  id="contraseñanueva"  name="txtContraseñaNueva"" type="text" class="form-control" id="pelicula">
                  </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar</button>
                </div>
                <a href="/PaginaPeliculas/equipo4/PaginaPrincipal/Inicio.php" class="btn btn-warning" style="width: 15%;" >Regresar</a>
              </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
    document.getElementById('Email1').disabled=true;
    document.getElementById('contraseñanueva').disabled=true;

    contraseñaActual.addEventListener('click',(e)=>{
        document.getElementById('contraseñanueva').disabled=false;


     }); 
    </script>
</body>
</html>