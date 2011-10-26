<?php
include('dbfunctions.php');
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['passwd'];
$privilegio = $_POST['privilegios'];

execute_insert('usuarios',array('user' => $usuario, 'passwd' => base64_encode($password), 'privilegio' => $privilegio));

?>

<script type="text/javascript">
  history.go(-2);
</script>
