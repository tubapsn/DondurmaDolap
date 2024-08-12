<?php

class SepetModel {
  
  public $id;
  public $ad;
  public $agirlik;
  public $cihaz_id;
  
  public $cihaz;

  public static function generator($query, $cihaz = null) {
    $x = array();
    foreach ($query->result() as $r) {
      $y = new SepetModel();
      $y->id = isset($r->sepet_id) && is_numeric($r->sepet_id) ? intval($r->sepet_id) : -1;
      $y->ad = isset($r->sepet_adi) ? $r->sepet_adi : null;
      $y->agirlik = isset($r->sepet_agirlik) && is_numeric($r->sepet_agirlik) ? doubleval($r->sepet_agirlik) : 0.0;
      $y->cihaz_id = isset($r->cihaz_id) && is_numeric($r->cihaz_id) ? intval($r->cihaz_id) : -1;
      $y->cihaz = $cihaz;
      $x[] = $y;
    }
    return $x;
  }
}

class Sepetler_model extends CI_Model {
  
  const TABLE_NAME = 'sepetler';
    
  public function __construct() {
    parent::__construct();
  }
  
  public function getAll($cihaz = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->get();
    return SepetModel::generator($query, $cihaz);
  }

  public function getById($id, $cihaz = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('sepet_id', $id)->limit(1)->get();
    $r = SepetModel::generator($query, $cihaz);
    return array_shift($r);
  }
  
  public function findByCihaz($cihaz_id, $cihaz = null) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('cihaz_id', $cihaz_id)->get();
    return SepetModel::generator($query, $cihaz);
  }
  
  public function getAllSepet() {
    $query = $this->db->select('sepet_adi')->distinct()->from(self::TABLE_NAME)->get();
    $sepetler = SepetModel::generator($query);
    $sepetadi = array();
    foreach ($sepetler as $sepet) {
      $sepetadi[] = $sepet->ad;
    }
    return $sepetadi;
  }
  
}
