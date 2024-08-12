var $doc = jQuery(document);
var $win = jQuery(window);

var IlceGetir = function() {
  jQuery("select[data-il]").each(function(){
    var $this = jQuery(this);
    
    $this.change(function(){
      var il = $this.val();
      var method = $this.attr("data-il");
      jQuery("[data-" + method + "]").html("");
      jQuery("select[data-ilce='" + method + "']").html("<option>İl Seç</option>");
      
      jQuery.ajax({
        url: SITE_URL + "api/" + method + "/il",
        method: "GET",
        data: { il: il },
        dataType: "json",
        success: function(data){
          console.log(data);
          if(data.is_err) {
            
          } else {
            var html = "<option selected>İlçe Seç</option>";
            for(var i = 0; i < data.msg.length; i++) {
              html += "<option value='" + data.msg[i] + "'>" + data.msg[i] + "</option>";
            }
            jQuery("select[data-ilce='" + method + "']").html(html);

            MarketGetir(il);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
          console.log(jqXHR);
        }
      });
    });
    
  });
};

var MarketGetir = function(il) {
  jQuery("select[data-ilce]").unbind("change");
  
  jQuery("select[data-ilce]").each(function(){
    var $this = jQuery(this);
    $this.change(function(){
      var ilce = $this.val();
      var method = $this.attr("data-ilce");
      
      jQuery.ajax({
        url: SITE_URL + "api/" + method + "/ilce",
        method: "GET",
        data: { il: il, ilce: ilce },
        dataType: "json",
        success: function(data){
          console.log(data);
          if(data.is_err) {
            
          } else {
            var html = "";
            for(var i = 0; i < data.msg.length; i++) {
              var m = data.msg[i];
              html += '<div class="span3"><div class="widget red">';
              html += '<div class="widget-title">' + 
                      '<h4><i class="icon-reorder"></i> ' + m.ad + '</h4>' +
                      '<div class="actions sm-btn-position">' +
                      '<a href="' + SITE_URL + 'site/market_detay/' + m.id + '" class="btn btn-primary btn-mini"><i class="icon-pencil"></i> Detaylı İncele</a>' + 
                      '</div></div>';
              html += '<div class="widget-body"><div class="portlet-scroll-2" tabindex="5001" style="overflow: hidden; outline: none;">' +
                      '<strong>' + m.il + ' ' + m.ilce + '</strong><br/>' + m.adres + '<br/>' + m.tel +
                      '</div></div></div></div>';
            }
            jQuery("[data-" + method + "]").html(html);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
          console.log(jqXHR);
        }
      });
    });       
  });
}

try {
  $doc.ready(IlceGetir);
} catch (e) {
  console.log(e);
}

try {
  $doc.ready(function() {
      GoogleMaps.init();
  });
} catch (e) {
  console.log(e);
}