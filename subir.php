<?php

include("conexion.php");

$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$categoria=$_POST['categoria'];

$imagen=$_FILES['imagen']['name'];

move_uploaded_file($_FILES['imagen']['tmp_name'],"imagenes/".$imagen);

$sql="INSERT INTO elementos(nombre,descripcion,imagen,categoria)
VALUES('$nombre','$descripcion','$imagen','$categoria')";

$conn->query($sql);

header("Location:index.php");

?>