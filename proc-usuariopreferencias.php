<?php
include('dbfunctions.php');
session_start();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$password = $_POST['passwd'];

execute_update('usuarios',array('passwd' => base64_encode($password), 'nombre' => $nombre),'`id` = '.$id);

?>

<script type="text/javascript">
  history.go(-1);
</script>
