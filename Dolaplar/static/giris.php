<?php session_start(); ?>
<?php
    $_SESSION['oturum'] = false;
    $_SESSION['user'] = array();
?>
<?php
    include('config.php');
    
    $email= filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    
    if(boolval($email) && boolval($password)) {
      $query = $connectDatabase->query("SELECT * FROM yetkili WHERE yetkili_email='$email' AND yetkili_sifre='" . md5($password) . "'");
      
      $result = boolval($query) ? $query->fetch(PDO::FETCH_ASSOC) : false;
      if ( $result ){
        
          $_SESSION['oturum'] = true;
          $_SESSION['user'] = $result;
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          exit;
      }
    }
    
    echo "Kullanıcı Adı Ya da Parola Hatalı";
    echo '<meta http-equiv="refresh" content="2;URL=login.php">';
    