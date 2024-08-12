 <!-- BEGIN PAGE -->  
<div id="main-content">
   <!-- BEGIN PAGE CONTAINER-->
   <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->   
      <div class="row-fluid">
         <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
             <h3 class="page-title">
               İç Sıcaklık
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
                                    <th class="hidden-phone"><i class="icon-inbox"></i> İç Sıcaklık</th>
                                    <th><i class="icon-time"></i> Tarih</th>
                                    <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($cihazlar as $cihaz) {
                                    echo '<tr><td><a href="' . base_url("site/market_detay/" . $cihaz->market->id) . '">' . $cihaz->market->ad . '</a></td>';
                                    echo '<td class="hidden-phone"><strong>Cihaz ID:</strong> #' . $cihaz->id . ", <strong>İç Sıcaklık:</strong> " . $cihaz->ic_sicaklik . '</td>';
                                    echo '<td>' . $cihaz->tarih . '</td>';
                                    echo '<td><a class="btn btn-danger" href="tel:' . $cihaz->market->tel . '" target="_blank"><i class="icon-phone"></i> ARA</a></td></tr>';
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