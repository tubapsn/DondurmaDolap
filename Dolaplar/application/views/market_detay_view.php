<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid" style="margin-top:50px;">
            <div class="widget red">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> <?php echo $market->ad;  ?></h4>
                </div>
                <div class="widget-body">
                    <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">
                        <div class="span3">
                          <img src="<?php echo base_url("static/img/aykut.jpg"); ?>" style="height:200px; width:300px" alt="">
                        </div>
                        <div class="span9">
                            <strong><?php echo $market->il . " " . $market->ilce; ?></strong><br>
                            <?php echo $market->adres; ?><br>
                            <?php echo $market->tel; ?><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <!--BEGIN GENERAL STATISTICS-->
            <div class="widget orange">
                <div class="widget-title">
                    <h4><i class="icon-tasks"></i> Sepet Durumu </h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <?php
                      foreach ($sepetler as $id => $sepet) {
                        echo '<div class="text-center"><br/><h4><strong>Cihaz ID: </strong>#' . $id . '</h4>';
                        foreach ($sepet as $s) {
                          echo '<div class="easy-pie-chart">';
                          echo '<div class="percentage success" data-percent="' . $s->agirlik . '"><span>' . $s->agirlik . '</span>%</div>';
                          echo '<div class="title">' . $s->ad . '</div></div>';
                        }
                        echo '</div>';
                      }
                    ?>
                </div>
            </div>
            <!--END GENERAL STATISTICS-->
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> İç Sıcaklık</h4>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">
                            <?php
                                foreach ($cihazlar as $cihaz) {
                                    echo '<p><strong>Cihaz ID:</strong> #' . $cihaz->id . ', ';
                                    echo '<strong>Kapak Durumu:</strong> ' . ($cihaz->kapak_durumu == 1 ? "Kapalı" : "Açık") . ', ';
                                    echo '<strong>Sıcaklık:</strong> <span>' . $cihaz->ic_sicaklik . ' <sup>o</sup></span></p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Dış Sıcaklık</h4>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">
                            <?php
                                foreach ($cihazlar as $cihaz) {
                                    echo '<p><strong>Cihaz ID:</strong> #' . $cihaz->id . ', ';
                                    echo '<strong>Kapak Durumu:</strong> ' . ($cihaz->kapak_durumu == 1 ? "Kapalı" : "Açık") . ', ';
                                    echo '<strong>Sıcaklık:</strong> <span>' . $cihaz->dis_sicaklik . ' <sup>o</sup></span></p>';
                                }
                            ?>
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
                    <input type="hidden" value="<?php echo $market->enlem; ?>" class="yKonumu">
                    <input type="hidden" value="<?php echo $market->boylam; ?>" class="xKonumu">
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