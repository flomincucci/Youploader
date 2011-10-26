<?php include('header.php'); 
			include('dbfunctions.php');
			$query = execute_select('usuarios',array('*'),'`id` = '.$_SESSION['user_id']); 
			if($query) {
				$usuario = $query[0]['user'];
				$password = base64_decode($query[0]['passwd']);
				$nombre = $query[0]['nombre'];
			} else {
				$usuario = '';
				$password = '';
				$nombre = '';
			}
			if($_SESSION['user_id'] != ''):
?>

        <ul id="mainNav">
        	<li><a href="dashboard.php">ESCRITORIO</a></li>
        	<li><a href="administracion.php">ADMINISTRACION</a></li>
        	<li><a href="preferencias.php" class="active">PREFERENCIAS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>

        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="#" class="active">Mi cuenta</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <h2><a href="#">Preferencias</a> &raquo; <a href="#" class="active">Mi cuenta</a></h2>
                
                <div id="main">

					<h3>Mis datos</h3>
								<form action="proc-usuariopreferencias.php" class="jNice" method="POST">
                    	<fieldset>
													<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="id" />
                        	<p><label>Nombre:</label><input type="text" class="text-long" value="<?php echo $nombre ?>" name="nombre" /></p>
                        	<p><label>Contrase&ntilde;a:</label><input type="password" class="text-long" value="<?php echo $password ?>" name="passwd" /></p>
													<p><label>Repita su contrase&ntilde;a:</label><input type="password" class="text-long" value="<?php echo $password ?>" /></p>
                            <input type="submit" value="Guardar" />
                        </fieldset>
									</form>

						<div class="clear">&nbsp;</div>

                </div>
                <!-- // #main -->
			<?php else: ?>
					<div>No tiene permisos para ver esto.</div>
			<?php endif; ?>
                <?php include('footer.php'); ?>
