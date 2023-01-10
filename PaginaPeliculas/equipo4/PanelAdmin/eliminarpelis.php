<?php 
include ('Conexiondb.php');
header('Access-Control-Allow-Origin: *');
$esta_ok=TRUE;
$IDpeli=$_REQUEST['ID_Peli'];
if($IDpeli=='' || $IDpeli ==null){
    echo('LOS DATOS NO PUEDEN ESTAR VACIOS');
}
else{
$consulta1="SELECT * FROM Peliculas WHERE ID_Pelicula='$IDpeli'";
$resultado1=mysqli_query($conexion,$consulta1);
$res=mysqli_num_rows($resultado1);
if($resultado1){
    $consulta=" DELETE FROM Peliculas WHERE ID_Pelicula=' $IDpeli' " ;
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado==true){
        echo("LA INFORMACION SE ELIMINO CORRECTAMENTE");

    }
    else{
        echo("OCURRIO UN ERROR");

    }


}
else{

}
}
?>