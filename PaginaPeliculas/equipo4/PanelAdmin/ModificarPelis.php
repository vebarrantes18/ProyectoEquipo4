<?php 
include ('Conexiondb.php');
header('Access-Control-Allow-Origin: *');
$esta_ok=TRUE;
$IDpeli=$_REQUEST['txtIDPeli'];
$nombrePelicula=$_REQUEST['NombrePeli'];
$añoPelicula=$_REQUEST['txtAño'];
$sinopsis=$_REQUEST['txtSinopsis'];
$categoria=$_REQUEST['txtCategoria'];
$trailer=$_REQUEST['txtTrailer'];
$pelicula=$_REQUEST['txtPelicula'];
if($IDpeli=='' || $IDpeli ==null || $nombrePelicula=='' || $nombrePelicula==null || $añoPelicula=='' || $añoPelicula==null || $sinopsis=='' || $sinopsis==null || $categoria=='' || $categoria==null ||   $trailer=='' || $trailer==null || $pelicula=='' || $pelicula==null ){
    echo('LOS DATOS NO PUEDEN ESTAR VACIOS');
}
else{
//session_start();
//$_SESSION['Pelicula']=$nombrePelicula;
$consulta1="SELECT * FROM Peliculas WHERE ID_Pelicula='$IDpeli'";
$resultado1=mysqli_query($conexion,$consulta1);
$res=mysqli_num_rows($resultado1);
if($resultado1)
    {
        $consulta="UPDATE peliculas SET Año='$añoPelicula', Sinopsis='$sinopsis', Categoria='$categoria', Trailer='$trailer',Enlace_Película='$pelicula'  WHERE ID_Pelicula=' $IDpeli' " ;
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado ==true)
        {
            echo("LA INFORMACION SE MODIFICO CORRECTAMENTE");
        }
        else{
            echo("OCURRIO UN ERROR");
        }
    }
else{
    echo('NO SE ENCONTRO LA PELICULA');
}    
}

?>