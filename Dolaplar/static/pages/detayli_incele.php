<?php require_once("../oturum_kontrol.php"); ?>
<?php
	include_once('../config.php');
    
    $m_id = filter_input(INPUT_GET, "m_id");
    
    $id = $m_id === FALSE || !is_numeric($m_id) ? 0 : intval($m_id);
    
    if($id > 0) {
      $sql = "SELECT * FROM marketler WHERE market_id = " . $id;
      $query = $connectDatabase->query($sql);
      $market = $query !== FALSE ? $query->fetch(PDO::FETCH_ASSOC) : FALSE;

      if($market === FALSE) {
        echo '<meta http-equiv="refresh" content="0;URL=' . $site_url . 'pages/marketler.php">';
        exit;
      }
      
      $sql = "SELECT * FROM cihazlar WHERE market_id = " . $id;
      $query = $connectDatabase->query($sql);
      $cihaz = $query !== FALSE ? $query->fetch(PDO::FETCH_ASSOC) : FALSE;
      
?>
<?php include_once('../part/header.php'); ?>

<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid" style="margin-top:50px;">
            <div class="widget red">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> <?php echo $market["market_adi"];  ?></h4>
                </div>
                <div class="widget-body">
                    <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">

                        <div class="span3">
                            <img src="<?php echo $site_url; ?>img/aykut.jpg" style="height:200px; width:300px" alt="">
                        </div>
                        <div class="span9">
                            <strong><?php echo $market["market_il"] . " " . $market["market_ilce"]; ?></strong><br>
                            <?php echo $market["market_adres"]; ?><br>
                            <?php echo $market["market_tel"]; ?><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> İç Sıcaklık</h4>
                    </div>
                    <div class="widget-body" style="    height: 45px;">
                        <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">
                            <strong>İç Sıcaklık</strong><br> <span>55 <sup>o</sup></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Dış Sıcaklık</h4>
                    </div>
                    <div class="widget-body" style="    height: 45px;">
                        <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">
                            <strong>Dış Sıcaklık</strong><br> <span>55 <sup>o</sup></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="page">
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN MARKERS PORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Konum</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div id="gmap_marker" class="gmaps"></div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $market["market_enlem"]; ?>" class="yKonumu">
                    <input type="hidden" value="<?php echo $market["market_boylam"]; ?>" class="xKonumu">
                    <!-- END MARKERS PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->

<!-- BEGIN PAGE CONTENT-->
<div id="page" style="display:none !important;">
    <div class="row-fluid">
        <div class="span6">
            <!-- BEGIN BASIC PORTLET-->
            <div class="widget orange">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Basic</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <div id="gmap_basic" class="gmaps"></div>
                </div>
            </div>
            <!-- END BASIC PORTLET-->
        </div>

    </div>
</div>
<!-- END PAGE CONTENT-->

<?php 
    include_once '../part/footer.php';
    } else {
      echo '<meta http-equiv="refresh" content="0;URL=' . $site_url . 'pages/marketler.php">';
    }
?>