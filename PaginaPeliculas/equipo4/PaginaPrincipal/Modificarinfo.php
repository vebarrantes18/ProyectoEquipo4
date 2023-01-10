<?php 
include ('db.php');
session_start();

$varSession1=$_SESSION['email'];
if($varSession1==null  ||  $varSession1==''){
   echo 'Usted no tiene autorizacion ';
   die();
}
$Nombreusuario=$_POST['txtNombreUsuario'];
$ContraseñaActual=$_POST['txtContraseñaActual'];
$ContraseñaNueva=$_POST['txtContraseñaNueva'];
if($Nombreusuario==null || $Nombreusuario=='' || $ContraseñaActual==null || $ContraseñaActual=='' || $ContraseñaNueva==null || $ContraseñaNueva=='' )
{
    ?>
    <?php 
    include("userinfo.php")
    ?>
    <h1 class="Succses">LOS DATOS NO PUEDEN ESTAR VACIOS</h1>
    <?php 
}
else{
    $consulta1="SELECT Usuario  FROM usuarios WHERE  Correo='$varSession1'";
    $resultado1=mysqli_query($conexion,$consulta1);
    $filas1=mysqli_fetch_array($resultado1);
    if($filas1==$Nombreusuario)
    {
        ?>
        <?php 
        include("userinfo.php")
        ?>
        <h1 class="Succses">EL USUARIO ES EL MISMO YA REGISTRADO</h1>
        <?php 
    }
    else{
        $consulta0="UPDATE usuarios SET Usuario='$Nombreusuario' WHERE Correo='$varSession1' ";
        $resultado0=mysqli_query($conexion,$consulta0);

        $consulta2="SELECT Contraseña  FROM usuarios WHERE Correo='$varSession1'";
        $resultado2=mysqli_query($conexion,$consulta2);
        $filas2=mysqli_fetch_array($resultado2);
       if($ContraseñaActual==$filas2['Contraseña'])
        {
        $consulta3="UPDATE usuarios SET Contraseña='$ContraseñaNueva' WHERE Correo='$varSession1' ";
        $resultado3=mysqli_query($conexion,$consulta3);
        if($resultado3=true){
            ?>
            <?php 
            include("userinfo.php")
            ?>
            <h1 class="Succses">SE CAMBIARON LOS DATOS CORRECTAMENTE</h1>
            <?php 
        }
        }
        else{
            ?>
            <?php 
            include("userinfo.php")
            ?>
            <h1 class="Succses">LA CONTRASEÑA ES ERRONEA</h1>
            <?php 
        }

    }
 }
?>