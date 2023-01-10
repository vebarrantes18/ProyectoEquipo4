<?php 
include ('Conexiondb.php');
header('Access-Control-Allow-Origin: *');
if($_REQUEST['Titulopeli']=='' || $_REQUEST['Titulopeli']== null){
    echo ('No puede estar vacio ');
}
else{
$titulo1= $_REQUEST['Titulopeli'];   
$consulta0="SELECT * FROM peliculas WHERE Titulo='$titulo1' ";
$resultado0=mysqli_query($conexion,$consulta0);
$row1=mysqli_fetch_array($resultado0);
if($row1 !=''  || $row1 != null){
    $id1=$row1['ID_Pelicula'];
    $Año1=$row1['Año'];
    $Sinopsis1=$row1['Sinopsis'];
    $Categoria1=$row1['Categoria'];
    $Imagen1=$row1['Imagen'];
    $Trailer1=$row1['Trailer'];
    $Enlace1=$row1['Enlace_Película'];
    $informacion=[$Año1 , $Sinopsis1, $Categoria1, $Imagen1, $Trailer1, $Enlace1, $id1 ];
    //for($i = 0; $i < (count($informacion)) ; $i++)
    //{
    //echo ($informacion[$i]);
     //}
     print_r('&&&&');
     print_r($informacion[0]);
     print_r('&&&&');
     print_r($informacion[1]);
     print_r('&&&&');
     print_r($informacion[2]);
     print_r('&&&&');
     print_r($informacion[3]);
     print_r('&&&&');
     print_r($informacion[4]);
     print_r('&&&&');
     print_r($informacion[5]);
     print_r('&&&&');
     print_r($informacion[6]);
     print_r('&&&&');
}
else{
    echo("No existe ninguna pelicula con este titulo");
}
}
?>