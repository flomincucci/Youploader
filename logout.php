<?php
    include_once('dbfunctions.php');
		session_start();
 
        $_SESSION["user_id"]= '';
        $_SESSION["user_permission"] = 0;
        ?>
        <script type="text/javascript">
            document.location = "<?php echo HOME_URL ?>";
        </script>
       
