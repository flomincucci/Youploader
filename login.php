<?php
    include_once('dbfunctions.php');
		session_start();
    $pass = base64_encode($_POST["password"]);
    $user = $_POST["usuario"];
    $criterio = '`passwd`="'.$pass.'" and `user`="'.$user.'"';
    $result = execute_select("usuarios",array('`id`','`privilegio`'),$criterio);
    if(count($result)==1)
    {
        $_SESSION["user_id"]= $result[0]["id"];
        $_SESSION["user_permission"] = $result[0]["privilegio"];
        ?>
        <script type="text/javascript">
            document.location = "<?php echo HOME_URL ?>/dashboard.php";
        </script>
        <?php
    }
    else
    {
        $_SESSION["error"] = true;
        ?>
        <script type="text/javascript">
            document.location = "<?php echo HOME_URL ?>";
        </script>
        <?php
    }
?>
