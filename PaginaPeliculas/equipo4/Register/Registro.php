<?php 
$usuario=$_POST['txtEmail'];
$email=$_POST['txtEmail'];
$contrasena1=$_POST['txtContraseña'];
$contrasena2=$_POST['txtContraseñaValid'];
if($contrasena1==$contrasena2)
{
    session_start();
    $_SESSION['email']=$email;
    include('db.php');
    $consulta1="SELECT * FROM usuarios WHERE Correo='$email'";
    $resultado1=mysqli_query($conexion,$consulta1);
    $filas1=mysqli_num_rows($resultado1);
    if($filas1)
    {
        ?>
        <?php 
        include("Register.html")
        ?>
        <h1 class="Error">YA EXISTE UNA CUENTA REGISTRADA CON ESE CORREO</h1>
        <?php 
    }
    else{
    $consulta="INSERT INTO usuarios VALUES ('','$usuario','$contrasena1','$email', 1)" ;
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado){
        header("location:/PaginaPeliculas/equipo4/Register/Felicidades.html");
    }
    else{
        ?>
        <?php 
        include("Register.html")
        ?>
        <h1 class="Error">Ocurrio un error , intentelo de nuevo mas tarde</h1>
        <?php 
    }
    }
}
else{
    ?>
        <?php 
        include("Register.html")
        ?>
        <h1 class="Error">LAS CONTRASEÑAS NO COINCIDEN</h1>
        <?php 
     }
