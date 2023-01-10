<?php 
$email=$_POST['txtEmail'];
$Contrasena=$_POST['txtContraseña'];
session_start();
$_SESSION['email']=$email;

include('db.php');

$Consulta="SELECT * FROM usuarios WHERE Correo='$email' AND Contraseña='$Contrasena'" ;
$Resultado=mysqli_query($conexion,$Consulta);
$Filas=mysqli_num_rows($Resultado);

if($Filas){
    header("location:/PaginaPeliculas/equipo4/PaginaPrincipal/Inicio.php");
}
else{
    ?>
    <?php 
    include("index.html")
    ?>
    <h1 class="Error"> ERROR EN LA AUTENTICACION, VERIFIQUE SU CORREO O CONTRASEÑA</h1>
    <?php 
}
