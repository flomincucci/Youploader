<?php
include('dbfunctions.php');
session_start();

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['passwd'];
$privilegio = $_POST['privilegios'];

execute_update('usuarios',array('user' => $usuario, 'passwd' => base64_encode($password), 'privilegio' => $privilegio, 'nombre' => $nombre),'`id` = '.$id);

?>

<script type="text/javascript">
  history.go(-2);
</script>
