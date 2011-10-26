<?php
include('autentificacion.php');

function do_post_request_custom($url, $data, array $headers = null, $optional_headers = null) // Look mum, no cURL!
{
  $params = array('http' => array(
              'method' => 'POST',
						  'header' => $headers,
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

$url = 'http://gdata.youtube.com/action/GetUploadToken';
$authtoken = autentificacion_clientlogin();
$headers = array('Host: gdata.youtube.com', 'Authorization: GoogleLogin auth='.$authtoken, 'GData-Version: 2', 'X-GData-Key: key=AI39si7FvXleuHZRFmxKE4h2IQJ0OXALoGbkm4uElrbZvlOHsPLB66J6kZ0pv_0zSj9GBWYggwyb1fDySCbtRno2O5hoKG7M6w', 'Content-Type: application/atom+xml; charset=UTF-8');
$data = '<?xml version="1.0"?>
<entry xmlns="http://www.w3.org/2005/Atom"
  xmlns:media="http://search.yahoo.com/mrss/"
  xmlns:yt="http://gdata.youtube.com/schemas/2007">
  <media:group>
    <media:title type="plain">'.$_POST['titulo'].'</media:title>
    <media:description type="plain">
      '.$_POST['descripcion'].'
    </media:description>
    <media:category
      scheme="http://gdata.youtube.com/schemas/2007/categories.cat">People
    </media:category>
    <media:keywords>'.$_POST['keywords'].'</media:keywords>
		<yt:private/>
  </media:group>
</entry>';

$sentmeta =	do_post_request_custom($url, $data, $headers); //Envio metadatos del video
preg_match("/url>(.*)<\/url/",$sentmeta,$uploadurl); // Extraigo URL de upload de la rta
$uploadurl = $uploadurl[1];
preg_match("/token>(.*)<\/token/",$sentmeta,$uploadtoken); // Extraigo token de upload
$uploadtoken = $uploadtoken[1];

?>

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

									<h3>Seleccione el video</h3>
                    	<fieldset>

										<form action="<?php echo $uploadurl ?>?nexturl=http%3A%2F%2Flocalhost%2Fyouploader%2Fsuccess.php" method="post"
											enctype="multipart/form-data" onsubmit="return checkForFile();">
											<input id="file" type="file" name="file"/>
											<div id="errMsg" style="display:none;color:red">
												You need to specify a file.
											</div>
											<input type="hidden" name="token" value="<?php echo $uploadtoken ?>"/>
											<input type="submit" value="Subir" />
										</form>

											</fieldset>

                </div>
                <!-- // #main -->
                <?php include('footer.php'); ?>
