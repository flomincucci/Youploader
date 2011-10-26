<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouP!loader</title>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>
</head>

<body>
	<div id="wrapper">
    	<h1><a href="#"><span>YouP!loader</span></a></h1>
        
        <div id="containerHolder">
			<div id="container">
                
                <?php if(isset($_SESSION["error"]) && $_SESSION["error"] == true): ?>
									<div class="error">Usuario y/o contrasen&ntilde;a incorrectos</div>
									<?php $_SESSION["error"] = false; ?>
								<?php endif; ?>
                <div id="main">
                	<form action="login.php" class="jNice" method="POST">
					<h3>Login</h3>
                    	<fieldset>
                        	<p><label>Usuario:</label><input type="text" class="text-long" name="usuario" /></p>
                        	<p><label>Contrase&ntilde;a:</label><input type="password" class="text-long" name="password" /></p>
                            <input type="submit" value="Entrar" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer"><a href="http://www.perspectived.com">Perspectived.</a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>

</body>
</html>
