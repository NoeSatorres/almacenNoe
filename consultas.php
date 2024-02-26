<?php
require_once("conexion.php");

function listar()
{
	$conexion = conectar();
	if ($conexion != null) {
		$sql = "SELECT * FROM productos";
		$consulta = mysqli_query($conexion, $sql);
		if (mysqli_num_rows($consulta) > 0) {
			while ($datos = mysqli_fetch_assoc($consulta)) {
				echo '
                <tr>
                    <th scope="row">' . $datos["codigo"] . '</th>
                    <td>' . $datos["categoria"] . '</td>
                    <td>' . $datos["fechaAlta"] . '</td>
                    <td>' . $datos["nombre"] . '</td>
                    <td>' . $datos["precio"] . ' x kg</td>
                    <td><img src="' . $datos["imagen"] . '" width=50,height=50></img></td>
                    <td>
                        <form method="GET" action="editar.php">
                            <button class="btn btn-sm btn-outline-dark" name="codigo" value="' . $datos["codigo"] . '">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </form>
                    </td>';

				if ($datos["estado"] == 1) {
					echo '
                    <td>
                        <form method="POST">
                            <button class="btn btn-sm btn-outline-success" name="botonHabilitar" value="' . $datos["codigo"] . '">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            <input name="estado" value="' . $datos["estado"] . '" hidden>
                        </form>
                    </td>
                    </tr>
                    ';
				}

				if ($datos["estado"] == 0) {
					echo '
                    <td>
                        <form method="POST">
                            <button class="btn btn-sm btn-outline-danger" name="botonHabilitar" value="' . $datos["codigo"] . '">
                                <i class="fa-solid fa-x"></i>
                            </button>
                            <input name="estado" value="' . $datos["estado"] . '" hidden>
                        </form>
                    </td>
                    </tr>
                    ';
				}
			}
		}
		mysqli_close($conexion);
	}
}
if (isset($_POST["botonHabilitar"])) {
	$codigo = $_POST["botonHabilitar"];
	$estado = $_POST["estado"];
	if ($estado == 1) {
		$estado = 0;
	} elseif ($estado == 0) {
		$estado = 1;
	}
	$sql = "UPDATE productos SET estado='" . $estado . "' WHERE codigo='" . $codigo . "'";
	$conexion = conectar();
	$modificar = mysqli_query($conexion, $sql);

	if ($modificar) {
		mysqli_close($conexion);
	}
}

if (isset($_POST["botonModificar"])) {
	$codigo = $_POST["inputCodigo"];
	$categoria = $_POST["inputCategoria"];
	$fechaAlta = $_POST["inputFecha"];
	$nombre = $_POST["inputNombre"];
	$precio = $_POST["inputPrecio"];
	$sql = "UPDATE productos SET categoria='" . $categoria . "',fechaAlta='" . $fechaAlta . "',nombre='" . $nombre . "',precio='" . $precio . "' WHERE codigo='" . $codigo . "'";
	$conexion = conectar();
	$modificar = mysqli_query($conexion, $sql);

	if ($modificar) {
		mysqli_close($conexion);
		header("location:index.php");
	}
}

if (isset($_POST["botonGuardar"])) {
	$conexion = conectar();
	$categoria = $_POST["inputCategoria"];
	$nombre = $_POST["inputNombre"];
	$precio = $_POST["inputPrecio"];
	$sql = "INSERT INTO productos(categoria,nombre,precio) VALUES('" . $categoria . "','" . $nombre . "','" . $precio . "')";
	$guardar = mysqli_query($conexion, $sql);
	if (!$guardar) {
		echo "Se ha producido algún error";
	} else {
		$guardado = "exitoso";
	}
	mysqli_close($conexion);
}

if (isset($_POST["botonLogin"])) {
	$conexion = conectar();
	$usuario = $_POST["inputNombreUsuario"];
	$clave = $_POST["inputClaveUsuario"];
	$sql = "SELECT * FROM usuarios WHERE nombre='" . $usuario . "' AND clave='" . $clave . "'";
	$busqueda = mysqli_query($conexion, $sql);
	if (mysqli_num_rows($busqueda) > 0) {
		$_SESSION["login"] = $usuario;
		header("location:gestion.php");
	} else {
		echo '
        <script type="text/javascript">
            alert("Usuario o contraseña incorrecta")
        </script>
        ';
	}
}

function verProductos()
{
	$conexion = conectar();
	$sql = "SELECT * FROM productos WHERE estado = 1 ";
	$consulta = mysqli_query($conexion, $sql);
	if (mysqli_num_rows($consulta) > 0) {
		while ($datos = mysqli_fetch_assoc($consulta)) {
			echo '
            <div class="card" style="width: 18rem;">
              <img src="' . $datos["imagen"] . '" class="card-img-top" alt="..." " style="background-color: #D4EFF9;">
              <div class="card-body">
                <h5 class="card-title">' . $datos["nombre"] . '</h5>
                <p class="card-text">' . $datos["precio"] . '</p>
              </div>
            </div>
            ';
		}
	}
}
