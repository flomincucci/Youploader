<?php include('header.php'); ?>

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
                    	<li><a href="#">Novedades</a></li>
                    	<li><a href="#" class="active">Subir video</a></li>
											<li><a href="#">Mis videos</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <h2><a href="#">Escritorio</a> &raquo; <a href="#" class="active">Subir video</a></h2>
                
                <div id="main">
<h3>Carga completa</h3>
<div>
<?php if($_GET['status'] == '200') echo 'Se subi&oacute; bien!<br />'; ?>
<?php if(isset($_GET['id'])) echo 'El video se encuentra en <a href="http://www.youtube.com/watch?v='.$_GET['id'].'">www.youtube.com/watch?v='.$_GET['id'].'</a>' ?>
</div>
<br />
                </div>
                <!-- // #main -->
                <?php include('footer.php'); ?>