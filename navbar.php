<div class="container-fluid bg-primary">
	<div class="row">
		<div class="col-10">
			<h1 class="bg-primary text-white text-center">
				<a href="http://localhost/incuyo/Almacen%20Noe/" style="text-decoration: none; color: white;">
					Almacén "El Buen Gusto"
				</a>
			</h1>
		</div>
		<div class="col-2">
			<?php 
			if (isset($_SESSION['login'])) {
				echo '
				<form method="POST">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
				    Cuenta
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				    <li><a class="dropdown-item" href="gestion.php">Gestion</a></li>
				    <li><button type="submit" class="dropdown-item" name="cerrarSesion">
			  			Cerrar Sesion
						</button>
					</li>
				  </ul>
				</div>
				
				</form>';
			}else{
				echo '<button type="button" class="btn-lg btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
			  Login
			</button>';
			}
			?>
			
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ingreso al personal</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST">
				<div class="modal-body">
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Usuario</span>
						<input type="text" class="form-control" placeholder="Ingrese su usuario" name="inputNombreUsuario" >
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Contraseña</span>
						<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="inputClaveUsuario" >
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="botonLogin">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
