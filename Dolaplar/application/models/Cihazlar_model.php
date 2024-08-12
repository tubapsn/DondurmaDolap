<?php

class CihazModel {
  
  public $id;
  public $enlem;
  public $boylam;
  public $ic_sicaklik;
  public $dis_sicaklik;
  public $tarih;
  public $kapak_durumu;
  public $market_id;
  
  public $market;
  public $sepetler;

  public static function generator($query, $market = null) {
    $x = array();
    foreach ($query->result() as $r) {
      $y = new CihazModel();
      $y->id = isset($r->cihaz_id) && is_numeric($r->cihaz_id) ? intval($r->cihaz_id) : -1;
      $y->enlem = isset($r->cihaz_enlem) && is_numeric($r->cihaz_enlem) ? doubleval($r->cihaz_enlem) : 0.0;
      $y->boylam = isset($r->cihaz_boylam) && is_numeric($r->cihaz_boylam) ? doubleval($r->cihaz_boylam) : 0.0;
      $y->ic_sicaklik = isset($r->ic_sicaklik) ? $r->ic_sicaklik : null;
      $y->dis_sicaklik = isset($r->dis_sicaklik) ? $r->dis_sicaklik : null;
      $y->tarih = isset($r->tarih) ? $r->tarih : null;
      $y->kapak_durumu = isset($r->kapak_durumu) ? $r->kapak_durumu : null;
      $y->market_id = isset($r->market_id) && is_numeric($r->market_id) ? intval($r->market_id) : -1;
      $y->market = $market;
      $y->sepetler = array();
      $x[] = $y;
    }
    return $x;
  }
}

class Cihazlar_model extends CI_Model {
  
  const TABLE_NAME = 'cihazlar';
    
  public function __construct() {
    parent::__construct();
  }
  
  public function getAll($market = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->get();
    return CihazModel::generator($query, $market);
  }

  public function getById($id, $market = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('cihaz_id', $id)->limit(1)->get();
    $r = CihazModel::generator($query, $market);
    return array_shift($r);
  }
  
  public function findByMarket($market_id, $market = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('market_id', $market_id)->get();
    return CihazModel::generator($query, $market);
  }
  
  public function findByKapak($status = FALSE) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('kapak_durumu', $status)->get();
    $cihazlar = CihazModel::generator($query);
    $marketler = array();
    $this->load->model("marketler_model", "market");
    foreach ($cihazlar as $i => $cihaz) {
      if(!isset($marketler[$cihaz->market_id])) {
        $marketler[$cihaz->market_id] = $this->market->getById($cihaz->market_id);
      }
      $cihazlar[$i]->market = $marketler[$cihaz->market_id];
    }
    return $cihazlar;
  }
  
  public function findByDisSicaklik($sicaklik = 11) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('dis_sicaklik < ', $sicaklik)->get();
    
    $cihazlar = CihazModel::generator($query);
    $marketler = array();
    $this->load->model("marketler_model", "market");
    foreach ($cihazlar as $i => $cihaz) {
      if(!isset($marketler[$cihaz->market_id])) {
        $marketler[$cihaz->market_id] = $this->market->getById($cihaz->market_id);
      }
      $cihazlar[$i]->market = $marketler[$cihaz->market_id];
    }
    return $cihazlar;
  }
  
  public function findByIcSicaklik($sicaklik = -10) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('ic_sicaklik > ', $sicaklik)->get();
    
    $cihazlar = CihazModel::generator($query);
    $marketler = array();
    $this->load->model("marketler_model", "market");
    foreach ($cihazlar as $i => $cihaz) {
      if(!isset($marketler[$cihaz->market_id])) {
        $marketler[$cihaz->market_id] = $this->market->getById($cihaz->market_id);
      }
      $cihazlar[$i]->market = $marketler[$cihaz->market_id];
    }
    return $cihazlar;
  }
}
