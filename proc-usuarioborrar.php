<?php
include('dbfunctions.php');
session_start();

$id = $_GET['id'];

execute_delete('usuarios',"`id` = ".$id);

?>

<script type="text/javascript">
  history.go(-1);
</script>
