<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Mar 2016 11:02:48 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index-2.html">
            <img class="center" alt="logo" src="img/algida-logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Giriş Yap</span>
            </div>
        </div>
        <form action="giris.php" method="post">
            <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="email" name="email" class="" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : null; ?>" placeholder="E-Posta Adresi" required>
                </div>
            </div>
            <div class="metro double-size yellow">
                <div class="input-append lock-input">
                    <input type="password" name="password" class="" placeholder="Şifre" required>
                </div>
            </div>
            <div class="metro single-size terques login">
                <button type="submit" name="submit" class="btn login-btn">
                    Giriş Yap
                    <i class=" icon-long-arrow-right"></i>
                </button>
            </div>
        </form>
      <p style="color:red;"><?php echo boolval(filter_input(INPUT_POST, "submit")) ? "Kullanıcı Adı veya Şifre hatalı!" : null; ?></p>
    </div>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Mar 2016 11:02:48 GMT -->

</html>