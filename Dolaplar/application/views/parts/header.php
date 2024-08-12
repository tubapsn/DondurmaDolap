<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
   <meta charset="utf-8" />
   <title>Algida Dolap Takibi</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="<?php echo base_url("static/assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/assets/bootstrap/css/bootstrap-responsive.min.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/assets/bootstrap/css/bootstrap-fileupload.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/assets/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/css/style.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/css/style-responsive.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/css/style-default.css"); ?>" rel="stylesheet" id="style_color" />
   <link href="<?php echo base_url("static/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css"); ?>" rel="stylesheet" />
   <link href="<?php echo base_url("static/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css"); ?>" rel="stylesheet" type="text/css" media="screen"/>
   <script>
     window.SITE_URL = '<?php echo base_url(); ?>';
   </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    <!-- BEGIN HEADER -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!--BEGIN SIDEBAR TOGGLE-->
                <div class="sidebar-toggle-box hidden-phone">
                    <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--END SIDEBAR TOGGLE-->
                <!-- BEGIN LOGO -->
                <a class="brand" href="/">
                    <img src="<?php echo base_url("static/img/algida-logo.png"); ?>" alt="Algida" />
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="arrow"></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <div id="top_menu" class="nav notify-row">
                    <!-- BEGIN NOTIFICATION -->
                    <ul class="nav top-menu">

                    </ul>
                </div>
                <!-- END  NOTIFICATION -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >
                        <!-- BEGIN SUPPORT -->
                       
                        <!-- END SUPPORT -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url("static"); ?>/img/avatar1_small.jpg" alt="">
                                <span class="username"><?php echo $yetkili->ad . " " . $yetkili->soyad; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="<?php echo base_url("site/profil"); ?>"><i class="icon-user"></i> Profil</a></li>
                                <li><a href="<?php echo base_url("site/logout"); ?>"><i class="icon-key"></i> Çıkış Yap</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div id="container" class="row-fluid">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar-scroll">
            <div id="sidebar" class="nav-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="sidebar-menu">
                    <li class="sub-menu active">
                        <a class="" href="<?php echo base_url(); ?>">
                            <i class="icon-dashboard"></i>
                            <span>Anasayfa</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>Kullanıcı Arayüzü</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="<?php echo base_url("site/yetkililer"); ?>">Yetkililer</a></li>
                            <li><a class="" href="#">Bildirimler</a></li>
                            <li><a class="" href="#">Takvim</a></li>
                            <li><a class="" href="<?php echo base_url("site/profil"); ?>">Profil</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a class="" href="javascript:;">
                            <i class="icon-trophy"></i>
                            <span>Kontrol Paneli</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url("site/marketler"); ?>" class=""> Marketler</a></li>
                            <li><a href="<?php echo base_url("site/kapak_durumu"); ?>" class="">Kapak Durumu</a></li>
                            <li><a href="<?php echo base_url("site/ic_sicaklik"); ?>" class="">İç Sıcaklık</a></li>
                            <li><a href="<?php echo base_url("site/dis_sicaklik"); ?>" class="">Dış Sıcaklık</a></li>
                            <li><a href="<?php echo base_url("site/sepet_durumu"); ?>" class="">Sepet Durumu</a></li>
                            <li><a href="<?php echo base_url("site/konum"); ?>" class="">Konum</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>Grafikler</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="#chartjs.html">Grafikler</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-file-alt"></i>
                            <span>Kilit Ekranı</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="#lock.html">Kilit Ekran</a></li>
                            <li><a class="" href="#contact_us.html">İletişim</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->