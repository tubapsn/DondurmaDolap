<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

  private $data;
  private $oturum;

  public function __construct() {
    parent::__construct();

    $this->data = array();
    $this->data["oturum"] = null;
    $c_url = str_replace("index.php/", "", current_url());

    if($c_url !== base_url("site/login") && !$this->yetki_kotrol()) {
      redirect(base_url("site/login"));
    }

    $this->load->model("yetkili_model", "yetkili");
    $this->data["yetkili"] = json_decode($this->session->userdata('user'));
  }

  public function index() {
    $this->load_view('index_view');
  }

  public function marketler() {
    $this->load->model("marketler_model", "market");
    $this->data["market_il"] = $this->market->getAllIl();

    $this->load_view("marketler_view");
  }
  
  public function market_detay($id = -1) {
    if(is_numeric($id) && intval($id) > 0) {
      $this->load->model("marketler_model", "market");
      $this->load->model("cihazlar_model", "cihaz");
      $this->load->model("sepetler_model", "sepet");
      $this->data["market"] = $this->market->getById($id);
      
      if(isset($this->data["market"])) {
        
        $this->data["cihazlar"] = $this->cihaz->findByMarket($id, $this->data["market"]);
        
        foreach ($this->data["cihazlar"] as $cihaz) {
          $this->data["sepetler"][$cihaz->id] = $this->sepet->findByCihaz($cihaz->id, $cihaz);
        }
        
        return $this->load_view("market_detay_view");
      }
    }
    
    redirect(base_url("site/marketler"));
  }
  
  public function kapak_durumu() {
    $this->load->model("cihazlar_model", "cihaz");
    $this->data["cihazlar"] = $this->cihaz->findByKapak();
    
    $this->load_view("kapak_durumu_view");
  }
  
  public function ic_sicaklik($sicaklik = -10) {
    $this->load->model("cihazlar_model", "cihaz");
    $this->data["cihazlar"] = $this->cihaz->findByIcSicaklik($sicaklik);
    
    $this->load_view("ic_sicaklik_view");
  }
  
  public function dis_sicaklik($sicaklik = 10) {
    $this->load->model("cihazlar_model", "cihaz");
    $this->data["cihazlar"] = $this->cihaz->findByDisSicaklik($sicaklik);
    
    $this->load_view("dis_sicaklik_view");
  }
  
  public function sepet_durumu() {
    $this->load->model("sepetler_model", "sepet");
    $this->load->model("marketler_model", "market");
    
    $this->data["sepetler"] = $this->sepet->getAllSepet();
    $this->data["marketler"] = $this->market->getAllMarketDetay();
    
    $this->load_view("sepet_durum_view");
  }
  
  public function konum() {
    $this->load->model("marketler_model", "market");
    
    $this->data["marketler"] = $this->market->getAllCihazlar();
    
    $this->load_view("cihaz_konum_view");
  }

  public function login() {
    $b = $this->input->post('submit');
    if(isset($b)) {
      $u = $this->input->post('email');
      $p = $this->input->post('password');

      $this->data['login'] = array('u'=>$u);

      if(!empty($u) && !empty($p)) {
        $_u = $this->yetkili->login($u, $p);
        if(isset($_u)) {
          $this->session->set_userdata('user', json_encode($_u));
          redirect(base_url('site/index'));
        } else {
          $this->data['error'] = 'Kullanıcı adı veya şifre hatalı!';
        }
      } else {
        $this->data['error'] = 'Kullanıcı adı veya şifre boş geçilemez!';
      }
    }
    $this->session->unset_userdata('user');
    $this->load->view('login_view', $this->data);
  }

  public function logout() {
    $this->session->unset_userdata('user');
    redirect(base_url("site/login"));
  }

  private function load_view($view) {
    $this->load->view("parts/header", $this->data);
    $this->load->view($view, $this->data);
    $this->load->view("parts/footer", $this->data);
  }

  private function yetki_kotrol() {
    $sess = $this->session->userdata('user');
    $this->data["oturum"] = isset($sess) ? json_decode($sess) : null;
    return isset($sess);
  }
}
