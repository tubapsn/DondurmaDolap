<?php session_start(); ?>
<?php
    $_SESSION['oturum'] = false;
    $_SESSION['user'] = array();
    echo '<meta http-equiv="refresh" content="0;URL=login.php">';
?>