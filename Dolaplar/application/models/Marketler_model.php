<?php

class MarketModel {
  
  public $id;
  public $ad;
  public $il;
  public $ilce;
  public $tel;
  public $adres;
  public $enlem;
  public $boylam;
  
  public $cihazlar;

  public static function generator($query) {
    $x = array();
    foreach ($query->result() as $r) {
      $y = new MarketModel();
      $y->id = isset($r->market_id) && is_numeric($r->market_id) ? intval($r->market_id) : -1;
      $y->ad = isset($r->market_adi) ? $r->market_adi : null;
      $y->il = isset($r->market_il) ? $r->market_il : null;
      $y->ilce = isset($r->market_ilce) ? $r->market_ilce : null;
      $y->tel = isset($r->market_tel) ? $r->market_tel : null;
      $y->adres = isset($r->market_adres) ? $r->market_adres : null;
      $y->enlem = isset($r->market_enlem) && is_numeric($r->market_enlem) ? doubleval($r->market_enlem) : 0.0;
      $y->boylam = isset($r->market_boylam) && is_numeric($r->market_boylam) ? doubleval($r->market_boylam) : 0.0;
      $y->cihazlar = array();
      $x[] = $y;
    }
    return $x;
  }
}

class Marketler_model extends CI_Model {
  
  const TABLE_NAME = 'marketler';
    
  public function __construct() {
    parent::__construct();
  }
  
  public function getAllMarket() {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->get();
    return MarketModel::generator($query);
  }

  public function getById($id) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('market_id', $id)->limit(1)->get();
    $r = MarketModel::generator($query);
    return array_shift($r);
  }
  
  public function findByIl($il) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('market_il', $il)->get();
    return MarketModel::generator($query);
  }
  
  public function findByIlce($il, $ilce) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where(array('market_il'=>$il, 'market_ilce'=>$ilce))->get();
    return MarketModel::generator($query);
  }
  
  public function getAllIl() {
    $query = $this->db->select('market_il')->distinct()->from(self::TABLE_NAME)->get();
    $marketler = MarketModel::generator($query);
    $iller = array();
    foreach ($marketler as $market) {
      $iller[] = $market->il;
    }
    return $iller;
  }
  
  public function getAllIlce($il) {
    $query = $this->db->select('market_ilce')->distinct()->from(self::TABLE_NAME)->where('market_il', $il)->get();
    $marketler = MarketModel::generator($query);
    $ilceler = array();
    foreach ($marketler as $market) {
      $ilceler[] = $market->ilce;
    }
    return $ilceler;
  }
  
  public function getAllMarketDetay() {
    $this->load->model("cihazlar_model", "cihaz");
    $this->load->model("sepetler_model", "sepet");
    
    $query = $this->db->select('*')->from(self::TABLE_NAME)->get();
    $marketler = MarketModel::generator($query);
    
    foreach ($marketler as $market) {
      $market->cihazlar = $this->cihaz->findByMarket($market->id, $market);
      foreach ($market->cihazlar as $cihaz) {
        $cihaz->sepetler = $this->sepet->findByCihaz($cihaz->id, $cihaz);
      }
    }
    
    return $marketler;
  }
  
  public function getAllCihazlar() {
    $this->load->model("cihazlar_model", "cihaz");
    
    $query = $this->db->select('*')->from(self::TABLE_NAME)->get();
    $marketler = MarketModel::generator($query);
    
    foreach ($marketler as $market) {
      $market->cihazlar = $this->cihaz->findByMarket($market->id, $market);
    }
    
    return $marketler;
  }
}
