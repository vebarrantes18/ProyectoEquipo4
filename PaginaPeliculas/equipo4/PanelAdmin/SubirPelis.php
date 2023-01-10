<?php 
include ('Conexiondb.php');
$esta_ok=TRUE;
$nombrePelicula=$_REQUEST['txtNombre'];
$añoPelicula=$_POST['txtAño'];
$sinopsis=$_POST['txtSinopsis'];
$categoria=$_POST['txtCategoria'];
$imagen = $_FILES['txtImagen']['name'];
$trailer=$_POST['txtTrailer'];
$pelicula=$_POST['txtPelicula'];
if($nombrePelicula=='' || $nombrePelicula==null || $añoPelicula=='' || $añoPelicula==null || $sinopsis=='' || $sinopsis==null || $categoria=='' || $categoria==null ||  $imagen=='' || $imagen==null ||  $trailer=='' || $trailer==null || $pelicula=='' || $pelicula==null ){
    ?>
    <?php 
    include("MenuAdmin.php")
    ?>
    <h1 class="Succses">LOS DATOS NO PUEDEN ESTAR VACIOS</h1>
    <?php 
}
else{
//session_start();
//$_SESSION['Pelicula']=$nombrePelicula;
$consulta1="SELECT * FROM Peliculas WHERE Titulo='$nombrePelicula' AND Año='$añoPelicula'";
$resultado1=mysqli_query($conexion,$consulta1);
$filas1=mysqli_num_rows($resultado1);
if($filas1)
    {
        ?>
        <?php 
        include("MenuAdmin.php")
        ?>
        <h1 class="Succses">YA EXISTE UNA PELICULA REGISTRADA CON EL MISMO NOMBRE Y AÑO</h1>
        <?php 
    }
else{

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['txtImagen']['type'];
        $temp  = $_FILES['txtImagen']['tmp_name'];
        
       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
          //$_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp';
          //$_SESSION['tipo'] = 'danger';
          ?>
        <?php 
        include("MenuAdmin.php")
        ?>
        <h1 class="Succses"> solo se permite archivos jpeg, gif, webp</h1>
        <?php 
          
       }else{
        $consulta="INSERT INTO Peliculas VALUES ('','$nombrePelicula','$añoPelicula','$sinopsis', '$categoria', '$imagen', '$trailer', '$pelicula')" ;
        $resultado=mysqli_query($conexion,$consulta);
    if($resultado){
        move_uploaded_file($temp,'imagenes/'.$imagen);   
        //$_SESSION['mensaje'] = 'se ha subido correctamente';
        //$_SESSION['tipo'] = 'success';
        include("MenuAdmin.php")
        ?>
        <h1 class="Succses">SE SUBIO CORRECTAMENTE  </h1>
        
        <?php 
        
    }
    else{
        ?>
        <?php 
        include("MenuAdmin.php")
        ?>
        <h1 class="Error">Ocurrio un error , intentelo de nuevo mas tarde</h1>
        <?php 
    } 
       }
    }
}    
}

?>