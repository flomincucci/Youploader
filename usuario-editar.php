<?php include('header.php'); 
			include('dbfunctions.php');
			$query = execute_select('usuarios',array('*'),'`id` = '.$_GET['id']); 
			if($query) {
				$usuario = $query[0]['user'];
				$password = base64_decode($query[0]['passwd']);
				$nombre = $query[0]['nombre'];
			} else {
				$usuario = '';
				$password = '';
				$nombre = '';
			}
?>

        <ul id="mainNav">
        	<li><a href="dashboard.php">ESCRITORIO</a></li>
        	<li><a href="administracion.php" class="active">ADMINISTRACION</a></li>
        	<li><a href="preferencias.php">PREFERENCIAS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>

        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="#">Videos</a></li>
                    	<li><a href="administracion.php" class="active">Usuarios</a></li>
											<li><a href="cuenta.php">Cuenta</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <h2><a href="#">Administraci&oacute;n</a> &raquo; <a href="#">Usuarios</a> &raquo; <a href="#" class="active">Editar</a></h2>
                
                <div id="main">

					<h3>Editar usuario</h3>

								<form action="proc-usuarioeditar.php" class="jNice" method="POST">
                    	<fieldset>
													<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                        	<p><label>Usuario:</label><input type="text" class="text-long" name="usuario" value="<?php echo $usuario ?>"/></p>
													<p><label>Nombre:</label><input type="text" class="text-long" name="nombre" value="<?php echo $nombre ?>"/></p>
                        	<p><label>Contrase&ntilde;a:</label><input type="password" class="text-long" name="passwd" value="<?php echo $password ?>" /></p>
													<p><label>Privilegios:</label>
                            <select name="privilegios">
                            	<option value="1">Usuario</option>
                            	<option value="2">Crea Usuarios</option>
                            	<option value="3">Administrador</option>
                            </select>
													</p>
                            <input type="submit" value="Guardar" />
                        </fieldset>
									</form>

						<div class="clear">&nbsp;</div>

                </div>
                <!-- // #main -->
<?php include('footer.php'); ?>
