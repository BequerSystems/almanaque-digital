<?php

include("conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM elementos WHERE id='$id'";
$resultado=$conn->query($sql);
$datos=$resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" href="estilos.css">
</head>

<body>

<h1>Editar elemento</h1>

<form action="actualizar.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $datos['id']; ?>">

<input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required>

<textarea name="descripcion"><?php echo $datos['descripcion']; ?></textarea>

<input type="file" name="imagen">

<button type="submit">Actualizar</button>

</form>

</body>
</html>