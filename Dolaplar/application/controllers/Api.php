<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiModel {
  public $is_err;
  public $msg;
  public $res;
  
  public function getJson() {
    return json_encode($this);
  }
}

class Api extends CI_Controller {
  
  private $api;

  public function __construct() {
    parent::__construct();
    
    $this->api = new ApiModel();
  }

  public function market($q) {
    $this->load->model("marketler_model", "marketler");
    
    switch ($q) {
      case "il":
        $il = $this->input->get("il", TRUE);
        $ilceler = $this->marketler->getAllIlce($il);
        
        $this->api->is_err = count($ilceler) <= 0;
        $this->api->msg = $this->api->is_err ? "Kayıt Bulunamadı!" : $ilceler;
        $this->api->res = $this->api->is_err ? $il : null;
        
        break;
      case "ilce":
        $il = $this->input->get("il", TRUE);
        $ilce = $this->input->get("ilce", TRUE);
        
        $marketler = $this->marketler->findByIlce($il, $ilce);
        
        $this->api->is_err = count($marketler) <= 0;
        $this->api->msg = $this->api->is_err ? "Kayıt Bulunamadı!" : $marketler;
        $this->api->res = $this->api->is_err ? array("il"=>$il, "ilçe"=>$ilce) : null;
        
        break;
      default:
        $this->api->is_err = true;
        $this->api->msg = "Geçersiz Metot!";
        $this->api->res = $q;
        break;
    }
    
    echo $this->api->getJson();
  }
}
