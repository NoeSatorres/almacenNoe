<?php
session_start();
require("consultas.php");
require("libraries.php");
verificarSesion();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
	<?php require("navbar.php") ?>
	<?php 
	$conexion = conectar();
	if ($conexion != null) {
		echo '
		<div class="container" style="height: 80vh;">
		<form class="d-flex" method="POST">
        	<input class="form-control me-2" type="search" name="inputBuscar" placeholder="Buscar" >
        	<button class="btn btn-outline-primary" type="submit">Buscar</button>
      	</form>
		<table class="table">
	    <thead>
	        <tr>
	        <th scope="col">Código</th>
	        <th scope="col">Categoría</th>
	        <th scope="col">Fecha</th>
	        <th scope="col">Nombre</th>
	        <th scope="col">Precio</th>
	        <th scope="col">Imagen</th>
	        <th></th>
	        </tr>
	    </thead>
	    <tbody>';
	    // Llama a la función listar con la condición de estado
	    listar();
	echo '        
	    </tbody>
	    </table>
    </div>
    <div class="d-flex justify-content-center">
    	<a class="btn btn-lg btn-primary" href="nuevo.php">Agregar nuevo producto</a>
    </div>
		';
	}
	?>
	
	<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
