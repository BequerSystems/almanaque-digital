<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Almanaque</title>
<link rel="stylesheet" href="estilos.css">
</head>

<body>

<h1>Almanaque Digital</h1>

<button onclick="modoOscuro()">🌙 Modo oscuro</button>

<form method="GET">
<input type="text" id="buscador" placeholder="Buscar..." onkeyup="filtrar()">
<button type="submit">Buscar</button>
</form>

<form action="subir.php" method="POST" enctype="multipart/form-data">

<input type="text" name="nombre" placeholder="Nombre" required>

<textarea name="descripcion" placeholder="Descripción"></textarea>

<select name="categoria" required>

<option value="">Categoria</option>
<option value="Biologia">Biología</option>
<option value="Matematicas">Matemáticas</option>
<option value="Fisica">Física</option>
<option value="Quimica">Química</option>

</select>

<input type="file" name="imagen" required>

<button type="submit">Subir</button>

</form>

<div class="filtros">

<button onclick="filtrarCategoria('')">Todas</button>
<button onclick="filtrarCategoria('Biologia')">Biología</button>
<button onclick="filtrarCategoria('Matematicas')">Matemáticas</button>
<button onclick="filtrarCategoria('Fisica')">Física</button>
<button onclick="filtrarCategoria('Quimica')">Química</button>

</div>

<div class="galeria">

<?php

$buscar="";

if(isset($_GET['buscar'])){
$buscar=$_GET['buscar'];
}

$sql="SELECT * FROM elementos WHERE nombre LIKE '%$buscar%' ORDER BY nombre ASC";

$resultado=$conn->query($sql);

if($resultado && $resultado->num_rows>0){

while($row=$resultado->fetch_assoc()){

?>

<div class="card elemento">

<img src="imagenes/<?php echo $row['imagen']; ?>" onclick="abrirImagen(this)">

<h3><?php echo $row['nombre']; ?></h3>

<p><?php echo $row['descripcion']; ?></p>

<p><b><?php echo $row['categoria']; ?></b></p>

<a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
<a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este elemento?')">Eliminar</a>

</div>

<?php
}
}
?>

</div>

<div id="visor" class="visor" onclick="cerrarImagen()">
<img id="imagenGrande">
</div>

<script>

function abrirImagen(img){

let visor = document.getElementById("visor");
let imagenGrande = document.getElementById("imagenGrande");

visor.style.display = "flex";
imagenGrande.src = img.src;

}

function cerrarImagen(){
document.getElementById("visor").style.display = "none";
}

function filtrar(){

let input = document.getElementById("buscador").value.toLowerCase();
let elementos = document.getElementsByClassName("elemento");

for(let i=0;i<elementos.length;i++){

let texto = elementos[i].innerText.toLowerCase();

if(texto.includes(input)){
elementos[i].style.display="block";
}else{
elementos[i].style.display="none";
}

}

}

function filtrarCategoria(cat){

let elementos=document.getElementsByClassName("elemento");

for(let i=0;i<elementos.length;i++){

let texto=elementos[i].innerText;

if(cat=="" || texto.includes(cat)){
elementos[i].style.display="block";
}else{
elementos[i].style.display="none";
}

}

}

function modoOscuro(){

document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){
localStorage.setItem("modo","oscuro");
}else{
localStorage.setItem("modo","claro");
}

}
window.onload = function(){

if(localStorage.getItem("modo") === "oscuro"){
document.body.classList.add("dark");
}

}

</script>

</body>
</html>