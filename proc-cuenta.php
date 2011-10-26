<?php
include('dbfunctions.php');
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$checking = execute_select('config',array('count(1)'),'`key` = "usr"');
$checking = $checking[0]['count(1)'];
if ($checking > 0) {
	execute_update('config',array('key' => 'usr', 'value' => $usuario),'`key` = "usr"');
	execute_update('config',array('key' => 'passwd', 'value' => base64_encode($password)),'`key` = "passwd"');
} else {
	execute_insert('config',array('key' => 'usr', 'value' => $usuario));
	execute_insert('config',array('key' => 'passwd', 'value' => base64_encode($password)));
}

?>

<script type="text/javascript">
  history.back();
</script>
