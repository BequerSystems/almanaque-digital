<?php

include("conexion.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM elementos WHERE id='$id'";

    if($conn->query($sql)){
        echo "Registro eliminado";
    }

}

header("Location: index.php");

?>