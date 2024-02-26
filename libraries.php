<?php 
if (isset($_POST['cerrarSesion'])) {
	session_destroy();
	header("location:http://localhost/incuyo/Almacen%20Noe/");
}
function verificarSesion(){
	if (!isset($_SESSION["login"])) {
		header("location:http://localhost/incuyo/Almacen%20Noe/");
	}
}
?>