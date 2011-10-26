<?php include('header.php');
			include('dbfunctions.php');
			$query = execute_select('config',array('`key`, `value`'),'`key` = "usr" or `key` = "passwd"'); 
			if($query) {
				foreach($query as $row) {
					if($row['key'] == 'usr') $usuario = $row['value'];
					if($row['key'] == 'passwd') $password = base64_decode($row['value']);
				}
			} else {
				$usuario = '';
				$password = '';
			}
			if($_SESSION['user_id'] != '' && $_SESSION['user_permission'] == 3):
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
                    	<li><a href="administracion.php">Usuarios</a></li>
											<li><a href="cuenta.php" class="active">Cuenta</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <h2><a href="#">Administraci&oacute;n</a> &raquo; <a href="#" class="active">Cuenta</a></h2>
                
                <div id="main">

									<h3>Cuenta utilizada</h3>
                    	<fieldset>

												<form method="post" action="proc-cuenta.php">
													<p><label for="usuario">Usuario:</label><input type="text" class="text-medium" name="usuario" value="<?php echo $usuario ?>"/></p>
													<p><label for="password">Contrase&ntilde;a:</label><input type="password" class="text-medium" name="password" value="<?php echo $password ?>" /></p>
													<input type="submit" value="Enviar" />
												</form>

											</fieldset>

                </div>
                <!-- // #main -->
			<?php else: ?>
					<div>No tiene permisos para ver esto.</div>
			<?php endif; ?>
<?php include('footer.php'); ?>
