<?php include('header.php'); 
			if($_SESSION['user_id'] != ''): ?>

        <ul id="mainNav">
        	<li><a href="dashboard.php" class="active">ESCRITORIO</a></li>
        	<li><a href="administracion.php">ADMINISTRACION</a></li>
        	<li><a href="preferencias.php">PREFERENCIAS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>

        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<!--<li><a href="#">Novedades</a></li>-->
                    	<li><a href="#" class="active">Subir video</a></li>
											<li><a href="#">Mis videos (pr&oacute;x...)</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <h2><a href="#">Escritorio</a> &raquo; <a href="#" class="active">Subir video</a></h2>
                
                <div id="main">

									<h3>Metadata del video</h3>
                    	<fieldset>

												<form method="post" action="uploader.php">
													<p><label for="titulo">T&iacute;tulo:</label><input type="text" name="titulo" /></p>
													<p><label for="descripcion">Descripci&oacute;n:</label><textarea rows="1" cols="1" name="descripcion"></textarea></p>
													<p><label for="keywords">Palabras clave:</label><input type="text" name="keywords" /></p>
													<input type="submit" value="Enviar" />
												</form>

											</fieldset>

                </div>
                <!-- // #main -->
			<?php else: ?>
					<div>No tiene permisos para ver esto.</div>
			<?php endif; ?>
      <?php include('footer.php'); ?>
