<?php include('header.php'); 
			include('dbfunctions.php');
			$query = execute_select('usuarios',array('`user`, `nombre`, `id`')); 
			if($_SESSION['user_id'] != '' && $_SESSION['user_permission'] >= 2):
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
                
                <h2><a href="#">Administraci&oacute;n</a> &raquo; <a href="#" class="active">Usuarios</a></h2>
                
                <div id="main">

					<h3>Usuarios</h3>
											<small>Si no ves los cambios, apret&aacute; F5<br /><br /></small>
                    	<table cellpadding="0" cellspacing="0">
											<?php if($query): ?>
												<?php foreach($query as $i => $row): ?>
														<tr <?php if(($i % 2) == 1 ) echo 'class="odd"' ?>>
                                <td><strong><?php echo $row['user']?></strong> - <?php echo $row['nombre'] ?></td>
                                <td class="action"><a href="usuario-editar.php?id=<?php echo $row['id'] ?>" class="edit">Editar</a><a href="proc-usuarioborrar.php?id=<?php echo $row['id'] ?>" class="delete">Borrar</a></td>
                            </tr>                                                                  
												<?php endforeach; ?>
										<?php else: ?>
											<tr><td>No hay usuarios registrados</td></tr>
										<?php endif; ?>
                    </table>
						<div class="button-submit new"><a href="usuario-nuevo.php">Crear nuevo</a></div>
						<div class="clear">&nbsp;</div>

                </div>
                <!-- // #main -->
			<?php else: ?>
					<div>No tiene permisos para ver esto.</div>
			<?php endif; ?>
<?php include('footer.php'); ?>
