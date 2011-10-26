<?php
include('dbfunctions.php');
session_start();

$id = $_SESSION['user_id'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

execute_update('usuarios',array('nombre' => $nombre, 'passwd' => base64_encode($password)),'`id` = '.$id);

?>

<script type="text/javascript">
  history.back();
</script>
