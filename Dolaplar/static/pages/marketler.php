<?php require_once("../oturum_kontrol.php"); ?>
<?php
	include_once('../config.php');
    include_once('../part/header.php');
?>
<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">

      <div class="row-fluid">
        <select id="market_il" name="iller" data-il="market">
          <option selected>İller</option>
          <option value="istanbul">İstanbul</option>
          <option value="ankara">Ankara</option>
          <option value="sakarya">Sakarya</option>
        </select>
        <select id="market_ilce" name="ilceler" data-ilce="market">
          <option selected>İl Seç</option>
        </select>
      </div>

      <div data-market class="row-fluid" style="margin-top:50px;"></div>
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
    
<?php include_once '../part/footer.php'; ?>