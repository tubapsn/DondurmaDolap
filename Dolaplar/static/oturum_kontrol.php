<?php session_start(); ?>
<?php
    error_reporting(0);
    
    if(!isset($_SESSION['oturum'])) {
       echo '<meta http-equiv="refresh" content="0;URL=login.php">';
       exit();  
    }
    
    $data = $_SESSION["user"];