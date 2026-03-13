<?php

include("conexion.php");

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

if($_FILES['imagen']['name']!=""){

$imagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$destino="imagenes/".$imagen;

move_uploaded_file($ruta,$destino);

$sql="UPDATE elementos SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id='$id'";

}else{

$sql="UPDATE elementos SET nombre='$nombre', descripcion='$descripcion' WHERE id='$id'";

}

$conn->query($sql);

header("Location: index.php");

?>