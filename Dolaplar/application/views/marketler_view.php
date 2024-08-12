<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">

      <div class="row-fluid">
        <select id="market_il" name="iller" data-il="market">
          <option selected>İller</option>
          <?php
            foreach ($market_il as $il) {
              echo "<option value='" . $il . "'>" . ucfirst($il) . "</option>";
            }
          ?>
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