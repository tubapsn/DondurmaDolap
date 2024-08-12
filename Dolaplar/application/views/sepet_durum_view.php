 <!-- BEGIN PAGE -->  
<div id="main-content">
   <!-- BEGIN PAGE CONTAINER-->
   <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->   
      <div class="row-fluid">
         <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
             <h3 class="page-title">
               Sepet Durumu
             </h3>
             <!-- END PAGE TITLE & BREADCRUMB-->
         </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->

      <div id="page-wraper">
          <div class="row-fluid">
              <div class="span12">
                  <!-- BEGIN BASIC PORTLET-->
                  <div class="widget orange">
                      <div class="widget-title">
                          <h4><i class="icon-reorder"></i> Cihazlar</h4>
                      </div>
                      <div class="widget-body">
                          <table class="table table-striped table-bordered table-advance table-hover">
                              <thead>
                                <tr>
                                    <th><i class="icon-shopping-cart"></i> Market Adı</th>
                                    <th><i class="icon-key"></i> Cihaz ID</th>
                                    <?php
                                      foreach ($sepetler as $sepetAdi) {
                                        echo '<th><i class="icon-inbox"></i> ' . $sepetAdi . '</th>';
                                      }
                                    ?>
                                    <th><i class="icon-time"></i> Tarih</th>
                                    <th><i class="icon-bolt"></i> İşlemler</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($marketler as $market) {
                                    foreach ($market->cihazlar as $cihaz) {
                                      echo '<tr><td><a href="' . base_url("site/market_detay/" . $market->id) . '">' . $market->ad . '</a></td>';
                                      echo '<td class="hidden-phone">#' . $cihaz->id . '</td>';
                                      $cihaz_sepet = array();
                                      foreach ($cihaz->sepetler as $sepet) {
                                        $cihaz_sepet[$sepet->ad] = $sepet->agirlik;
                                      }
                                      foreach ($sepetler as $sepetAdi) {
                                        
                                        if(isset($cihaz_sepet[$sepetAdi])) {
                                          echo '<td class="' . ($cihaz_sepet[$sepetAdi] < 50 ? "text-error" : null) . '">%' . $cihaz_sepet[$sepetAdi] . '</td>';
                                        } else {
                                          echo '<td>Boş</td>';
                                        }
                                      }
                                      echo '<td>' . $cihaz->tarih . '</td>';
                                      echo '<td><a class="btn btn-danger" href="tel:' . $market->tel . '" target="_blank"><i class="icon-phone"></i> ARA</a></td></tr>';
                                    }
                                  }
                                ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <!-- END BASIC PORTLET-->
              </div>
          </div>
      </div>

      <!-- END PAGE CONTENT-->         
   </div>
   <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  